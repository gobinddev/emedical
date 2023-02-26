<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserProduct;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;
use App\UserProductAttribute;
use Livewire\Component;

class ProductController extends Controller
{
 
    public function search(Request $request)
      {
           $query = $request->get('query');
           $categoryname = DB::table('product_categories')->select('name','description','id')->get();
           $product ='';
           $productid =DB::table('user_products')->where('description','like','%'.$query.'%')->orWhere('product_title','like','%'.$query.'%')->orWhere('sku','like','%'.$query.'%')->select('id')->get();
      if($query !='')
         {
          foreach($productid as $list)
              {  
              $ids[] = $list->id;
              }
            if(isset($productid[0]->id))
     	       {
    	        $product = DB::table('user_products')->select('user_products.*','user_product_images.file_name as image','product_categories.name as category_name,product_categories.cdescription as category_description')
                  ->join('user_product_images', 'user_product_images.product_id' , '=', 'user_products.id')
                  ->join('user_product_attributes', 'user_product_attributes.product_id', '=', 'user_products.id')
                  ->join('user_product_documentations', 'user_product_documentations.product_id', '=', 'user_products.id')
                   ->join('user_product_attribute_values', 'user_products.id', '=', 'user_product_attribute_values.product_id')
                  ->leftjoin('product_categories', 'product_categories.id', '=', 'user_products.category_id')
                  ->whereIn('user_products.id', $ids)->paginate(8);  
    	        return view('front.product',compact('product','categoryname'));
    	      }
    	    else
    	     {
    	      return view('front.product',compact('product','categoryname'));
    	     }
         }
    
      }

  
    public function index(Request $request)
    {

        $all_products = UserProductAttribute::from('user_product_attributes as ua')
                        ->distinct('ua.product_id')
                        ->select('ua.*',DB::raw("MIN(ua.discounted_price) as dis_price"),'u.product_title','u.short_description','u.description','u.specification','u.in_box','u.is_popular','u.is_return','u.is_featured','u.status')
                        ->join('user_products as u','ua.product_id','=','u.id')
                        ->where('u.status','1')
                        ->whereNotNull('u.vendor_id');
                        if($request->get('brand_id')!='')
                        {
                            $all_products->where('u.brand_id',Crypt::decryptString($request->get('brand_id')));
                        }
                        if($request->get('category_id')!='')
                        {
                            $all_products->whereRaw('FIND_IN_SET(?,u.category_id)',[Crypt::decryptString($request->get('category_id'))]);
                        }
                        // if($request->get('min-price')!='')
                        // {
                        //     $all_products->where('ua.discounted_price','>=',$request->get('min-price'));
                        // }
                        // if($request->get('max-price')!='')
                        // {
                        //     $all_products->where('ua.discounted_price','<=',$request->get('max-price'));
                        // }

        $all_products=$all_products->groupBy('ua.product_id');
                        if($request->get('min-price')!='')
                        {
                            $all_products->having('dis_price','>=',$request->get('min-price'));
                        }
                        if($request->get('max-price')!='')
                        {
                            $all_products->having('dis_price','<=',$request->get('max-price'));
                        }
                        $all_products = $all_products->orderBy('u.created_at','desc')->paginate(12);

        $top_3_products = UserProduct::from('user_products as u')
                            ->distinct('ua.product_id')
                            ->select('u.*')
                            ->join('user_product_attributes as ua','ua.product_id','=','u.id')
                            ->whereNotNull('u.vendor_id')
                            ->where(['u.status'=>'1','u.is_popular'=>1])->groupBy('ua.product_id')->orderBy('u.created_at','desc')->take(3)->get();

        return view('front.product',compact('all_products','top_3_products'));
    }




   public function allproducts(Request $request)
    {
        
        
        if ($request->ajax() && isset($request->brand))
         {
            $brand_id = $request->brand;
            $id = $request->catid;
            $categoryname = DB::table('product_categories')->select('name','description','id')->get(); 
            $brand = DB::table('brands')
                ->select('brands.id', 'brands.name',DB::raw('count(brand_id) as total'))
               ->join('user_products', 'user_products.brand_id', '=', 'brands.id')
               ->where('user_products.category_id',$id)
               ->groupby('user_products.brand_id')
               ->get();
      
           $product = DB::table('user_products')->select('user_products.*','user_product_images.file_name as image','product_categories.name as category_name','product_categories.description as category_description')
                  ->join('user_product_images', 'user_product_images.product_id' , '=', 'user_products.id')
                  ->join('user_product_attributes', 'user_product_attributes.product_id', '=', 'user_products.id')
                  ->join('user_product_documentations', 'user_product_documentations.product_id', '=', 'user_products.id')
                  ->leftjoin('product_categories', 'product_categories.id', '=', 'user_products.category_id')
                  ->where('product_categories.id',$id)->where('user_products.brand_id', $brand_id)->paginate(8);  
                  
                  die;
                        response()->json($product);
             return  view('front.product',compact('product'));
        } 
    
        else 
        {
            $products = DB::table('products')->paginate(12);
            $categories = Category::whereNull('parent_id')->get();
            return view('front.product', ['product' => $products, 'categories' => $categories]);

        }

    }

    public function product_detail($id)
    {   
	

       $categoryname = DB::table('product_categories')->where('id',$id)->select('name','description','id')->get();    
       //dd($categoryname);
       $product = DB::table('user_products')->select('user_products.*','user_product_images.file_name as image','product_categories.name as category_name', 'user_product_documentations.file_name as documents','brands.name as brand_name', 'user_product_attributes.sku as brand_sku') 
                  ->join('user_product_images', 'user_product_images.product_id' , '=', 'user_products.id')
                  ->join('user_product_attributes', 'user_product_attributes.product_id', '=', 'user_products.id')
                  ->leftjoin('user_product_documentations', 'user_product_documentations.product_id', '=', 'user_products.id')
                  ->join('brands', 'brands.id', '=', 'user_products.brand_id')
                  ->join('product_categories', 'product_categories.id', '=', 'user_products.category_id')
                  ->where('user_products.id',$id)->get();
    // dd($product);
        $ratings = DB::table('product_ratings')->select('*')->where(['product_id'=>$id,'status'=>'1'])->get();

        return view('front.product-details',compact('product', 'ratings', 'categoryname'));
    }
    
    
    
    public function productCategoryDetails($id)
    {

       $categoryname = DB::table('product_categories')->select('name','description','id')->get(); 
       
       $brand = DB::table('brands')
                ->select('brands.id', 'brands.name',DB::raw('count(brand_id) as total'))
               ->join('user_products', 'user_products.brand_id', '=', 'brands.id')
               ->where('user_products.category_id',$id)
               ->groupby('user_products.brand_id')
               ->get();
      
       $product = DB::table('user_products')->select('user_products.*','user_product_images.file_name as image','product_categories.name as category_name','product_categories.description as category_description')
                  ->join('user_product_images', 'user_product_images.product_id' , '=', 'user_products.id')
                  ->join('user_product_attributes', 'user_product_attributes.product_id', '=', 'user_products.id')
                  ->join('user_product_documentations', 'user_product_documentations.product_id', '=', 'user_products.id')
                  ->join('product_categories', 'product_categories.id', '=', 'user_products.category_id')
                  ->where('product_categories.id',$id)->paginate(8);  
        
    //dd($product);
        return view('front.product',compact('product','categoryname','brand'));
    }
    
    public function submitreview(Request $request)
     {
        $user_id = Auth::guard('customer')->user()->id;

        $data = [
            'user_id' => $user_id,
            'product_id' => $request->get('product_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'rating' => $request->get('rate_value'),
            'review' => $request->get('review'),
        ];

        $insert = DB::table('product_ratings')->insert($data);
        if($insert){
            Session::flash('message', 'Customer Updated Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->back();
    }
    
    
    
    
    
    public function addtocart(Request $request)
     {
         $qty = $request->get('quantity');
         $price = $request->get('product_price');
         $totalPrice = $price * $qty;
         $customer_id = Session::get('user_id');
         
         if($totalPrice)
         {
         $data = [ 'product_id' => $request->get('product_id'),
                   'customer_id' => $customer_id,
                   'product_qty' => $request->get('quantity'),
                   'product_price' => $request->get('product_price'),
                   'product_name' => $request->get('product_name'),
                   'total_price' =>$totalPrice ];
         }         
        if($data)
        {
            
            $insert = DB::table('cart')->insert($data);
            if($insert)
            {
              $data= DB::table('cart')->where('customer_id', $customer_id)->count();
              return $data;
            }
            
        }
                   
    }
    

    function countCart(Request $request)
    {   $customerid =Session::get('user_id');
        $data= DB::table('cart')->where('customer_id', $customerid)->count();
        return $data;
    }
 
    function deleteCart(Request $request)
    { 
         $id = $request->get('row_id');
         $customerid =Session::get('user_id');
         $condition= DB::table('cart')->where('id', $id)->orwhere('customer_id', $customerid)->delete('cart');
         if($condition)
         {
          $data= DB::table('cart')->where('customer_id', $customerid)->count();
          return $data;
         }
          $data= DB::table('cart')->where('customer_id', $customerid)->count();
          return $data;
    }


}
