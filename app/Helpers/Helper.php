<?php
namespace App\Helpers;

use DB;
use App\CustomerAddress;
use App\UserProductAttribute;
use App\UserProductAttributeValue;
use App\Customer;
use App\DocumentLibrary;

class Helper{


    public static function get_brands()
    {
        $data = DB::table('brands')
                    ->where('status','1')
                    ->get();

        return $data;
    }

    public static function get_categories()
    {
        $data = DB::table('product_categories')
                    ->where('status','1')
                    ->where('parent_id',0)
                    ->where('e_dental',1)
                    ->orderby('product_categories.name','ASC')
                    ->get();

        return $data;
    }

    public static function get_categories_menu()
    {
        $data = DB::table('product_categories')
                    ->where('status','1')
                    ->where('parent_id',0)
                    ->where('e_medical',1)
                    ->orderby('product_categories.name','ASC')
                    ->get();

        return $data;
    }

    public static function get_category_data($category_id)
    {
        $data = DB::table('product_categories')->where('id',$category_id)->first();

        return $data;
    }

    public static function get_brand_data($brand_id)
    {
        $data = DB::table('brands')->where('id',$brand_id)->first();

        return $data;
    }

    public static function get_product_data($product_id)
    {
        $data = DB::table('user_products')->where('id',$product_id)->first();

        return $data;
    }

    public static function get_product_images($product_id)
    {
        $docs = array();

        $data = DB::table('user_product_images')->where('product_id',$product_id)->whereNotIn('status',[0,9])->orderBy('is_thumbnail','desc')->get();

        $path = public_path().'/uploads/products/image/';

        if(count($data)>0)
        {
            foreach($data as $item)
            {
                if($item->file_name!=NULL)
                {
                    $type = '';

                    $extArr = explode('.',$item->file_name);

                    $ext = end($extArr);

                    if(stripos($ext,'jpg')!==false || stripos($ext,'jpeg')!==false || stripos($ext,'png')!==false || stripos($ext,'gif')!==false || stripos($ext,'bmp')!==false || stripos($ext,'svg')!==false)
                    {
                        $type = url('/').'/uploads/products/image/'.$item->file_name;
                    }

                    $docs[]=array(
                        'file_id' => $item->id,
                        'file_name' => $item->file_name,
                        'filePath' => url('/').'/uploads/products/image/'.$item->file_name,
                        'fileThumbnail' => $item->is_thumbnail,
                        'fileIcon' => $type,
                        'fileExt' => $ext
                    );
                }
            }
        }

        return $docs;
    }

    public static function get_product_documentation($product_id)
    {
        $docs = array();

        $data = DB::table('user_product_documentations')->where('product_id',$product_id)->whereNotIn('status',[0,9])->get();

        $path = public_path().'/uploads/products/document/';

        if(count($data)>0)
        {
            foreach($data as $item)
            {
                if($item->file_name!=NULL)
                {
                    $type = '';

                    $extArr = explode('.',$item->file_name);

                    $ext = end($extArr);

                    if(stripos($ext,'jpg')!==false || stripos($ext,'jpeg')!==false || stripos($ext,'png')!==false || stripos($ext,'gif')!==false || stripos($ext,'bmp')!==false || stripos($ext,'svg')!==false)
                    {
                        $type = url('/').'/uploads/products/document/'.$item->file_name;
                    }

                    if(stripos($ext,'pdf')!==false)
                    {
                        $type = url('/').'/images/icon_pdf.png';
                    }

                    if(stripos($ext,'mp4')!==false)
                    {
                        $type = url('/').'/images/icon_video.png';
                    }

                    $docs[]=array(
                        'file_id' => $item->id,
                        'file_name' => $item->file_name,
                        'filePath' => url('/').'/uploads/products/document/'.$item->file_name,
                        'fileIcon' => $type,
                        'fileExt' => $ext
                    );
                }
            }
        }

        return $docs;
    }

    public static function get_product_documentation_d($product_id)
    {
        $docs = array();

        $data = DB::table('user_product_documentations')->where('product_id',$product_id)->whereNotIn('status',[0,9])->get();

        $path = public_path().'/uploads/products/document/';

        if(count($data)>0)
        {
            foreach($data as $item)
            {
                if($item->file_name!=NULL)
                {
                    $type = '';

                    $extArr = explode('.',$item->file_name);

                    $ext = end($extArr);

                    if(stripos($ext,'jpg')!==false || stripos($ext,'jpeg')!==false || stripos($ext,'png')!==false || stripos($ext,'gif')!==false || stripos($ext,'bmp')!==false || stripos($ext,'svg')!==false)
                    {
                        $type = url('/').'/uploads/products/document/'.$item->file_name;
                    }

                    if(stripos($ext,'pdf')!==false)
                    {
                        $type = url('/').'/images/icon_pdf.png';
                    }

                    if(stripos($ext,'mp4')!==false)
                    {
                        $type = url('/').'/images/icon_video.png';
                    }

                    if(stripos($ext,'jpg')!==false || stripos($ext,'jpeg')!==false || stripos($ext,'png')!==false || stripos($ext,'gif')!==false || stripos($ext,'bmp')!==false || stripos($ext,'svg')!==false || stripos($ext,'pdf')!==false)
                    {
                        $docs[]=array(
                            'file_id' => $item->id,
                            'file_name' => $item->file_name,
                            'filePath' => url('/').'/uploads/products/document/'.$item->file_name,
                            'fileIcon' => $type,
                            'fileExt' => $ext
                        );
                    }
                }
            }
        }

        return $docs;
    }

    public static function get_product_documentation_v($product_id)
    {
        $docs = array();

        $data = DB::table('user_product_documentations')->where('product_id',$product_id)->whereNotIn('status',[0,9])->get();

        $path = public_path().'/uploads/products/document/';

        if(count($data)>0)
        {
            foreach($data as $item)
            {
                if($item->file_name!=NULL)
                {
                    $type = '';

                    $extArr = explode('.',$item->file_name);

                    $ext = end($extArr);

                    if(stripos($ext,'jpg')!==false || stripos($ext,'jpeg')!==false || stripos($ext,'png')!==false || stripos($ext,'gif')!==false || stripos($ext,'bmp')!==false || stripos($ext,'svg')!==false)
                    {
                        $type = url('/').'/uploads/products/document/'.$item->file_name;
                    }

                    if(stripos($ext,'pdf')!==false)
                    {
                        $type = url('/').'/images/icon_pdf.png';
                    }

                    if(stripos($ext,'mp4')!==false)
                    {
                        $type = url('/').'/images/icon_video.png';
                    }

                    if(stripos($ext,'mp4')!==false)
                    {
                        $docs[]=array(
                            'file_id' => $item->id,
                            'file_name' => $item->file_name,
                            'filePath' => url('/').'/uploads/products/document/'.$item->file_name,
                            'fileIcon' => $type,
                            'fileExt' => $ext
                        );
                    }
                }
            }
        }

        return $docs;
    }

    public static function get_product_thumbnail_image($product_id)
    {
        $data = NULL;

        $data = DB::table('user_product_images')->where(['product_id'=>$product_id,'is_thumbnail'=>1])->whereNotIn('status',[0,9])->first();

        if($data==NULL)
        {
            $data = DB::table('user_product_images')->where(['product_id'=>$product_id])->whereNotIn('status',[0,9])->first();
        }

        return $data;


    }

    public static function get_category_products($category_id)
    {
        $data = DB::table('user_products')
                    ->where(['status'=>1])
                    ->whereRaw('FIND_IN_SET(?,category_id)',[$category_id])
                    ->get();

        return $data;
    }

    public static function get_brand_products($brand_id)
    {
        $data = DB::table('user_products')
                    ->where(['status'=>1,'brand_id'=>$brand_id])
                    ->get();

        return $data;
    }

    public static function get_country_data($country_id){

        $data = DB::table('countries')->where('id',$country_id)->first();

        return $data;
    }

    public static function get_state_data($state_id){

        $data = DB::table('states')->where('id',$state_id)->first();

        return $data;
    }

    public static function get_city_data($city_id){

        $data = DB::table('cities')->where('id',$city_id)->first();

        return $data;
    }

    public static function get_tags(){
        $data = DB::table('tag_masters')->where('status','<>',9)->get();

        return $data;
    }

    public static function get_topic_likes($topic_id)
    {
        $data = DB::table('topic_likes')->where('topic_id',$topic_id)->where('status',1)->get();

        return $data;
    }

    public static function get_all_topic_comments($topic_id)
    {
        $data = DB::table('topic_comments')->where('topic_id',$topic_id)->get();

        return $data;
    }

    public static function get_topic_like_status($topic_id,$user_id)
    {
        $data = DB::table('topic_likes')->where(['topic_id'=>$topic_id,'user_id'=>$user_id])->latest()->first();

        return $data;
    }

    public static function get_topic_tag($topic_id)
    {
        $data = NULL;

        $data = DB::table('topics')->where('id',$topic_id)->whereNotNull('tag_id')->first();

        return $data;
    }

    public static function get_comment_replies($parent_comment_id)
    {
        $data = DB::table('topic_comments as tc')
                    ->select('tc.*','c.display_name')
                    ->join('customers as c','c.id','=','tc.user_id')
                    ->where('tc.parent_id',$parent_comment_id)
                    ->where('c.status','<>',9)
                    ->orderBy('tc.created_at','desc')
                    ->get();

        return $data;
    }

    public static function get_feature_product_data()
    {
        $data = DB::table('user_products')->where(['is_featured'=>1,'status'=>1])->latest()->first();

        if($data==NULL)
        {
            $data = DB::table('user_products')->where(['status'=>1])->latest()->first();

        }

        return $data;
    }

    public static function get_blog_categories()
    {
        $data = DB::table('blog_categories as bi')
                    ->select('bi.*')
                    ->join('blogs as b','bi.id','=','b.category_id')
                    ->where('bi.status','1')
                    ->get();

        return $data;
    }

    public static function get_category_blogs($category_id)
    {
        $data = DB::table('blogs')
                    ->where(['status'=>1])
                    ->where('category_id',$category_id)
                    ->get();

        return $data;
    }

    public static function get_customer_address($address_id)
    {
        $data = CustomerAddress::from('customer_addresses as ca')
                                ->select('ca.*')
                                ->join('customers as c','c.id','=','ca.customer_id')
                                ->where('ca.id',$address_id)
                                ->first();

        return $data;
    }

    public static function get_testimonials()
    {
        $data = DB::table('testimonials')->where('status',1)->get();

        return $data;
    }

    public static function get_slider()
    {
        $data = DB::table('slider_images')->where('status',1)->get();

        return $data;
    }

    public static function getSubCategories($parent_id){

        $data = DB::table('product_categories')
                    ->where('status','1')
                    ->where('parent_id',$parent_id)
                    ->get();

        return $data;
    }

    public static function getBlogs(){
        $data = DB::table('blogs')
                ->where(['status'=>1])
                ->orderBy('id','desc')
                ->get();
        return $data;
    }

    public static function getTopics(){
        $data = DB::table('topics')
                ->where(['status'=>1])
                ->orderBy('id','desc')
                ->get();
        return $data;
    }

    public static function getAcademies(){
        $data = DB::table('academies')
                ->where(['status'=>1])
                ->orderBy('id','desc')
                ->get();
        return $data;
    }

    public static function getProductAttribute($product_id){
        $data = UserProductAttribute::where('product_id',$product_id)->get();

        return $data;
    }

    public static function getProductAttributeValue($product_attribute_id)
    {
        $data = UserProductAttributeValue::where('product_attribute_id',$product_attribute_id)->get();

        return $data;
    }

    public static function getProductAttributeByPrice($product_id)
    {
        $data = UserProductAttribute::from('user_product_attributes')
                                  ->Distinct('product_id')
                                  ->select('*',DB::raw('MIN(discounted_price) as price'))
                                  ->where('product_id',$product_id)
                                 ->first();

        return $data;
    }

    public static function productAttributeData($product_attribute_id)
    {
        $data = UserProductAttribute::where('id',$product_attribute_id)->first();

        return $data;
    }

    public static function getCustomerData($customer_id)
    {
        $data = Customer::where('id',$customer_id)->first();

        return $data;
    }

    public static function getDocumentCategory($category_id,$type)
    {
        $data = DocumentLibrary::where('category_id',$category_id)->where('document_type',$type)->where('status',1)->get();

        return $data;
    }

    public static function getMinProductPrice()
    {
        $data = UserProductAttribute::from('user_product_attributes as ub')
                    ->Distinct('ub.product_id')
                    ->select('ub.*',DB::raw('MIN(ub.discounted_price) as price'))
                    ->join('user_products as u','u.id','=','ub.product_id')
                    ->first();

        return $data;
    }

    public static function getMaxProductPrice()
    {
        $data = UserProductAttribute::from('user_product_attributes as ub')
                    ->Distinct('ub.product_id')
                    ->select('ub.*',DB::raw('MAX(ub.discounted_price) as price'))
                    ->join('user_products as u','u.id','=','ub.product_id')
                    ->first();

        return $data;
    }
}
?>
