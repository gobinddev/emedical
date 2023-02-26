<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use Illuminate\Support\Facades\Auth;
use DB;

class CatalogController extends Controller
{
    public function index()
    {
        $data = DB::table('catalog')->orderby('id','desc')->get();
        return view('vendor_module.catalog.index',compact('data'));
    }

    public function create()
    {
        $data = DB::table('product_categories')->orderby('id','desc')->get();
        return view('vendor_module.catalog.create', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'category_id'=> 'required',
        ]);

        DB::table('catalog')->insert([
       'name' => $request->name,
       'category_id' => $request->category_id
        ]);
        return redirect()->back()->with('success','Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id   = base64_decode($id);
        $data = DB::table('catalog')->find($id);
        $data1 = DB::table('product_categories')->orderby('id','desc')->get();
        return view('vendor_module.catalog.edit', compact('data1','data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'category_id'=> 'required',
        ]);
        $id = $request->id;
        DB::table('catalog')->where('id', $id)->update(['name'=>$request->name,'category_id'=>$request->category_id]);
        return redirect()->back()->with('success','Update Successfully');
    }

    public function destroy($id)
    {
        //
    }
}
