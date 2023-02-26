<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\TagMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DB;
class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        $tags = TagMaster::where('status','<>',9)->get();
        $blogs = Blog::where('status',1);
                    if($request->get('category_id')!='')
                    {
                        $blogs->where('category_id',[Crypt::decryptString($request->get('category_id'))]);
                    }
                    if($request->get('tag_id')!='')
                    {
                        $blogs->whereRaw('FIND_IN_SET(?,tag_id)',[Crypt::decryptString($request->get('tag_id'))]);
                    }
                    $blogs=$blogs->paginate(8);
        $recent_blogs = Blog::orderBy('id','desc')->get()->take(3);
        return view('front.blog.index',compact('blogs','tags','recent_blogs'));
    }

    public function details(Request $request)
    {
        $blog_id = Crypt::decryptString($request->id);

        // dd($blog_id);
        $tags = TagMaster::where('status','<>',9)->get();
        $blog=Blog::where('id',$blog_id)->first();

        // dd($blog);
        $recent_blogs = Blog::orderBy('id','desc')->get()->take(3);
        return view('front.blog.detail',compact('blog','tags','recent_blogs'));
    }
}
