<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Academy;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DB;
class AcademyController extends Controller
{
    //
    public function index(Request $request)
    {

        $academies = Academy::where('status',1);
        $academies=$academies->orderBy('id','desc')->get();

        return view('front.academy.index',compact('academies'));
    }

    public function details(Request $request)
    {
        $academy_id = Crypt::decryptString($request->id);

        // dd($blog_id);

        $academy=Academy::where('id',$academy_id)->first();

        // dd($blog);
        $academies = Academy::where('status',1)->orderBy('id','desc')->get();
        return view('front.academy.detail',compact('academy','academies'));
    }
}
