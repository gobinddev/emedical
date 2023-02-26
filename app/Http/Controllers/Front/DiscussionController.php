<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserProduct;
use App\Topic;
use App\TagMaster;
use App\TopicLike;
use App\TopicComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DB;
class DiscussionController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::where('status',1);
                if($request->get('tag_id')!='')
                {
                    $topics->whereRaw('FIND_IN_SET(?,tag_id)',[Crypt::decryptString($request->get('tag_id'))]);
                }
        $topics=$topics->paginate(6);

        $featured_topics = Topic::where('status',1)->where('is_featured',1);
                if($request->get('tag_id')!='')
                {
                    $featured_topics->whereRaw('FIND_IN_SET(?,tag_id)',[Crypt::decryptString($request->get('tag_id'))]);
                }
        $featured_topics=$featured_topics->get()->take(6);

        $past_weeks = Topic::where('status',1)
                ->whereDate('created_at','>=',date('Y-m-d',strtotime('- 6 days')))
                ->whereDate('created_at','<=',date('Y-m-d'));
                if($request->get('tag_id')!='')
                {
                    $past_weeks->whereRaw('FIND_IN_SET(?,tag_id)',[Crypt::decryptString($request->get('tag_id'))]);
                }
        $past_weeks=$past_weeks->get()->take(6);

        $past_months = Topic::where('status',1)
                ->whereDate('created_at','>=',date('Y-m-d',strtotime('- 1 month')))
                ->whereDate('created_at','<=',date('Y-m-d'));
                if($request->get('tag_id')!='')
                {
                    $past_months->whereRaw('FIND_IN_SET(?,tag_id)',[Crypt::decryptString($request->get('tag_id'))]);
                }
        $past_months=$past_months->get()->take(6);

        $featured_questions = Topic::where('is_featured',1)->orderBy('id','desc')->get()->take(4);
        $tags = TagMaster::where('status','<>',9)->get();
        return view('front.community',compact('topics','featured_questions','featured_topics','past_weeks','past_months','tags'));
    }

    public function details(Request $request)
    {
        $topic_id = Crypt::decryptString($request->id);
        $topic = Topic::where('id',$topic_id)->first();
        $featured_questions = Topic::orderBy('id','desc')->get()->take(4);
        $tags = TagMaster::where('status','<>',9)->get();
        $main_comments = TopicComment::from('topic_comments as tc')
                                        ->select('tc.*','c.display_name')
                                        ->join('customers as c','tc.user_id','=','c.id')
                                        ->where('tc.parent_id',0)
                                        ->where('tc.topic_id',$topic_id)
                                        ->where('c.status','<>',9)
                                        ->where('tc.status','=',1)
                                        ->orderBy('tc.created_at','desc')
                                        ->get();
        return view('front.community-detail',compact('topic','featured_questions','tags','main_comments'));
    }

    public function addTopic(Request $request)
    {
        if($request->isMethod('get'))
        {
            if(Auth::guard('customer')->check())
            {
                $user_id = Auth::guard('customer')->user()->id;

                return response()->json([
                    'success' => true
                ]);
            }
            else
            {
                Session::flash('message', 'Please Login or Signup First !!');

                Session::flash('alert-class', 'alert-danger');

                return response()->json([
                    'success' => false,
                ]);
            }
        }

        $rules = [
            'title' => 'required',
            'body' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

      DB::beginTransaction();
      try{
            $user_id = Auth::guard('customer')->user()->id;

            $product_id = Crypt::decryptString($request->product_id);

            $tag_id = NULL;

            if($request->tag!=NULL)
            {
                $tag_id = implode(',',$request->tag);
            }

            $data=[

                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'tag_id' => $tag_id,
                'product_id' => $product_id,
                'user_id' => $user_id,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $query = Topic::create($data);

            DB::commit();

            Session::flash('message', 'Topic Created Successfully !!');

            Session::flash('alert-class', 'alert-success');

            return response()->json([
                'success' => true,
            ]);


      }
      catch(\Exception $e)
      {
        DB::rollback();
        // something went wrong
        return $e;
      }
    }

    public function topicLikeStatus(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $topic_id = Crypt::decryptString($request->id);

        $status = NULL;

        $topic_like = TopicLike::where(['topic_id'=>$topic_id,'user_id'=>$user_id])->latest()->first();

        if($topic_like!=NULL)
        {
            $topic_status = TopicLike::where(['topic_id'=>$topic_id,'user_id'=>$user_id,'status'=>1])->latest()->first();

            if($topic_status!=NULL)
            {
                $status = 0;
            }
            else
            {
                $status = 1;
            }

            $data = [
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            TopicLike::find($topic_like->id)->update($data);
        }
        else
        {
            $data=[
                'topic_id' => $topic_id,
                'user_id'   => $user_id,
                'status'    => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];

            TopicLike::create($data);

            $status = 1;
        }

        $topic_like_count = TopicLike::where('status',1)->count();

        return response()->json([
            'success' =>true,
            'status' => $status,
            'count' => $topic_like_count
        ]);

    }

    public function postComment(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $topic_id = Crypt::decryptString($request->topic_id);

        $request->validate([
            'message' => 'required',
        ]
        );

        $data = [
            'topic_id' => $topic_id,
            'user_id' => $user_id,
            'comment' => $request->input('message'),
            'parent_id' => 0,
            'status'    => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        TopicComment::create($data);

        return redirect()->back();
    }

    public function postReply(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;
        $rules = [
            'message' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $comment_id = Crypt::decryptString($request->comment_id);

        $topic_comment = TopicComment::where('id',$comment_id)->first();

        $data = [
            'topic_id' => $topic_comment->topic_id,
            'user_id' => $user_id,
            'comment' => $request->input('message'),
            'parent_id' => $comment_id,
            'status'    => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        TopicComment::create($data);

        return response()->json([
            'success' => true,
        ]);
    }
}
