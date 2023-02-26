<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AppController extends Controller
{
    //

     /**
     * Get the City based on state selection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getcity(Request $request)
    {
       $state_id = $request->state_id;

       $city = DB::table('cities')->where('state_id',$state_id)->get();

       return response()->json($city);

    }

    /**
     * Get the State based on country selection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getstate(Request $request)
    {
       $country_id = $request->country_id;

       $state = DB::table('states')->where('country_id',$country_id)->get();

       return response()->json($state);

    }
}
