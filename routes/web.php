<?php

use App\DocumentLibrary;
use App\ProductCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|category/product/34
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear',function(){
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
    Artisan::call('route:cache');
	Artisan::call('view:clear');
    Artisan::call('route:clear');
	return "cleared";
});



Route::get('/email_verify/','AppController@verify_email_link')->name('email_verify');

Route::get('/thank-you', function () {
    return view('thankyou');
});

Route::get('/pass',function(){
	return bcrypt('tech@123');
});

Route::get('/','Front\HomeController@index');

Route::match(['get','post'],'/contactus','Front\HomeController@contactUs');

// Route::get('/aboutus', function () {
//     return view('front.about');
// });

Route::get('/coming-soon', function () {
    return view('front.coming-soon');
});

Route::post('/search','Front\ProductController@search');

// Route::get('/compare', function () {
//     return view('front.compare');
// });
Route::get('/compare', 'Front\CompareController@index');
Route::post('/addtocompare', 'Front\CompareController@addtocompare')->name('addtocompare');
Route::post('/removeCompare', 'Front\CompareController@removeCompare')->name('removeCompare');
// Route::post('/getproductbyid', 'Front\HomeController@getproductbyid');
Route::get('category/{id}', 'Front\HomeController@getproductbyid');
Route::get('/faq', function () {
    return view('front.faq');
});
Route::get('sign-up', 'Front\HomeController@indexSignin');
Route::post('/do-sign-up', 'Front\HomeController@registerCustomer');
Route::get('/visit-store/{id}', 'Front\HomeController@visitStore');
Route::get('product/{id}', 'Front\ProductController@product_detail');

Route::get('/logincustomer', function(){
	return view('front.login');
})->middleware('guest:customer')->name('customer.login');

Route::post('loginpost','Auth\Customer\LoginController@login')->middleware('guest:customer')->name('customer.loginpost');
Route::get('logout','Auth\Customer\LoginController@logout')->name('logout');
Route::get('/contact-us', 'Front\HomeController@contactUss');
Route::get('/privacy', 'Front\HomeController@privacy');
Route::get('/terms-and-condition', 'Front\HomeController@termsAndCondition');
Route::get('/about-us', 'Front\HomeController@aboutUs');
Route::get('/view-cart', 'Front\HomeController@viewCart');
Route::get('forgotpassword', 'Front\HomeController@forgotpassword');
Route::get('/brand-promotion/{id}','Front\HomeController@brandPromotion');
Route::get('/video-center', 'Front\HomeController@videoCenter');
Route::get('/product-detail/{id}', 'Front\ProductController@product_detail');
Route::get('category/product/{id}', 'Front\ProductController@productCategoryDetails');
Route::get('viewall/product/{id}', 'Front\ProductController@viewallproduct');
Route::get('myaccount', 'Front\HomeController@myaccount')->name('myaccount');
Route::post('deletecart','Front\ProductController@deleteCart');
Route::post('/countcart','Front\ProductController@countCart');
Route::post('ajaxfilter', 'Front\ProductController@allproducts');
Route::post('reset-password','Front\HomeController@passwordrest');

Route::post('/getsubscribe', 'Front/HomeController@getSubscribe');
Route::get('/cart', 'Front\CartController@index')->name('cart.index');
Route::match(['get','post'],'/cart/add/{id}', 'Front\CartController@add')->name('cart.add');
Route::get('/cart/delete/{id}', 'Front\CartController@destroy')->name('cart.delete');
Route::post('/cart/update', 'Front\CartController@update')->name('cart.update');
Route::get('/product', 'Front\ProductController@index');
Route::post('/addtocart', 'Front\ProductController@addtocart');
Route::post('/productByAjax', 'Front\ProductController@productByAjax')->name('productByAjax');
Route::post('/billingAddress/create','Front\HomeController@billingAddressCreate')->name('billingAddress.create');
Route::match(['get','post'],'/billingAddress/edit','Front\HomeController@billingAddressedit')->name('billingAddress.edit');
Route::get('/checkout', 'Front\CartController@checkout')->name('checkout');
Route::post('/place_order', 'Front\CartController@place_order')->name('place_order');

// Route::get('/rent',function(){
// 	return view('front.rent');
// })->name('customer.rent');

Route::get('/rent-detail',function(){
	return view('front.rent-detail');
})->name('customer.rent-detail');

Route::get('/rent-listing',function(){
	return view('front.rent-listing');
})->name('customer.rent-listing');

Auth::routes();

Route::get('/admin/login',function(){
	return view('auth.admin.login');
})->middleware('guest:web')->name('admin.login');

Route::post('dolgn','Auth\LoginController@login')->middleware('guest:web')->name('admin.dologin');

Route::get('/login', function(){
	return view('auth.login');
})->middleware('guest:customer')->name('customer.login');


	Route::get('create-transaction', 'Front\PaypalController@createTransaction')->name('createTransaction');
	Route::get('payment', 'Front\PaypalController@payment')->name('paypal');
	Route::get('cancel', 'Front\PaypalController@cancel')->name('paypal.cancel');
	Route::get('success', 'Front\PaypalController@success')->name('paypal.success');

Route::post('dologin','Auth\Customer\LoginController@login')->middleware('guest:customer')->name('customer.dologin');

Route::post('doregister','Auth\Customer\LoginController@register')->middleware('guest:customer')->name('customer.register');

Route::get('/become-partner', function(){

	$countries = DB::table('countries')->get();
    $states = DB::table('states')->where('country_id','101')->get();

	return view('front.become-partner',compact('countries','states'));
})->name('become-partner');

Route::post('/become-partner/register','Auth\Vendor\LoginController@register')->name('become-partner.register');

Route::post('/getstate','Front\AppController@getstate')->name('customer.getstate');

Route::post('/getcity','Front\AppController@getcity')->name('customer.getcity');

Route::get('/vendor/login',function(){
	return view('auth.vendor.login');
})->middleware('guest:vendor')->name('vendor.login');


Route::post('postcontact_us', 'HomeController@saveconatactus');

Route::match(['get', 'post'], '/discussion/addTopic','Front\DiscussionController@addTopic')->name('customer.discussion.addTopic');

// Route::group(['as'=>'customer.'],function() {
// 	//Customer Password Reset routes
// 	Route::get('/password/reset', 'Auth\Customer\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// 	Route::post('/password/email','Auth\Customer\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// 	Route::get('/password/reset/{token}', 'Auth\Customer\ResetPasswordController@showResetForm')->name('password.reset');
// 	Route::post('/password/reset', 'Auth\Customer\ResetPasswordController@reset')->name('password.update');

// 	Route::get('/community','Front\DiscussionController@index')->name('community');

// 	Route::get('/community-detail/{id}','Front\DiscussionController@details')->name('community-detail');

// 	Route::get('/blog','Front\BlogController@index')->name('blog');


// 	Route::get('/blog-detail/{id}','Front\BlogController@details')->name('blog-detail');

// 	Route::get('/brand-list','Front\HomeController@brandList')->name('brand-list');

// 	Route::get('/academy','Front\AcademyController@index')->name('academy');

//     Route::get('/academy-detail/{id}','Front\AcademyController@details')->name('academy-detail');

//     Route::post('/autocomplete','AjaxController@autocomplete')->name('autocomplete');

//     Route::post('/product-variant-price','AjaxController@productVariantPrice')->name('product-variant-price');

//     Route::post('/check-vendor-product','Front\AjaxController@checkVendorProduct')->name('check-vendor-product');
// });

// Route::group(['as'=>'customer.','middleware' => ['auth:customer']], function () {

// 	Route::get('/myaccount', 'Front\HomeController@myaccount')->name('myaccount');

// 	Route::post('/accountupdate', 'Front\HomeController@accountUpdate')->name('accountupdate');

// 	Route::post('/changepassword', 'Front\HomeController@changePassword')->name('changepassword');

// 	Route::get('/cart', 'Front\CartController@index')->name('cart.index');

// 	Route::match(['get','post'],'/cart/add/{id}', 'Front\CartController@add')->name('cart.add');

// 	Route::get('/cart/delete/{id}', 'Front\CartController@destroy')->name('cart.delete');

// 	Route::post('/cart/update', 'Front\CartController@update')->name('cart.update');

// 	Route::get('/wishlist', 'Front\WishlistController@index')->name('wishlist.index');

// 	Route::post('/wishlist/add', 'Front\WishlistController@add')->name('wishlist.add');

// 	Route::post('/wishlist/addToCart/{id}', 'Front\WishlistController@addToCart')->name('wishlist.addToCart');

// 	Route::get('/wishlist/delete/{id}', 'Front\WishlistController@destroy')->name('wishlist.delete');

// 	Route::post('logout','Auth\Customer\LoginController@logout')->name('logout');

// 	Route::post('/billingAddress/create','Front\HomeController@billingAddressCreate')->name('billingAddress.create');

// 	Route::match(['get','post'],'/billingAddress/edit','Front\HomeController@billingAddressedit')->name('billingAddress.edit');

// 	Route::get('/checkout', 'Front\CartController@checkout')->name('checkout');

// 	Route::post('/place_order', 'Front\CartController@place_order')->name('place_order');


// 	Route::get('create-transaction', 'Front\PaypalController@createTransaction')->name('createTransaction');
// 	Route::get('payment', 'Front\PaypalController@payment')->name('paypal');
// 	Route::get('cancel', 'Front\PaypalController@cancel')->name('paypal.cancel');
// 	Route::get('success', 'Front\PaypalController@success')->name('paypal.success');

// 	Route::get('/community','Front\DiscussionController@index')->name('community');

// 	Route::get('/community-detail/{id}','Front\DiscussionController@details')->name('community-detail');

// 	Route::post('/community/like','Front\DiscussionController@topicLikeStatus')->name('community.like');

// 	Route::post('/community/postcomment','Front\DiscussionController@postComment')->name('community.postComment');

// 	Route::post('/community/postReply','Front\DiscussionController@postReply')->name('community.postReply');
  
//   Route::get('/contact', 'Front\HomeController@contact')->name('contact');
// 	Route::get('/order-detail/{id}','Front\OrderController@details')->name('order-detail');
// 	Route::post('/submitreview','Front\ProductController@submitreview')->name('submitreview');
	

// });

Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => ['auth:web']], function () {

	// home
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/about_us', 'HomeController@about_us')->name('about_us');
 	Route::post('/about_us_update','HomeController@about_us_update')->name('about_us_update');
 	Route::get('/terms_of', 'HomeController@terms_of')->name('terms_of');
 	Route::post('/terms_of_update','HomeController@terms_of_update')->name('terms_of_update');
 	Route::get('/policy', 'HomeController@policy')->name('policy');
 	Route::post('/policy_update','HomeController@policy_update')->name('policy_update');
 	Route::get('/celebrity_descripion', 'HomeController@celebrity_descripion')->name('celebrity_descripion');
 	Route::post('/celebrity_description_update','HomeController@celebrity_description_update')->name('celebrity_description_update');
	// users
	Route::resource('users', 'UserController');

	// roles/products/products
	Route::resource('roles', 'RoleController');
	Route::post('/roles/getRoles','RoleController@getRoles')->name('roles.getRoles');

	// roles & permissions
	Route::get('/roles/{id}/permissions', 'RoleController@permissions');
	Route::put('/roles/{id}/update_permissions', 'RoleController@update_permissions')->name('roles.update_permissions');

	// executives
	Route::resource('executives', 'ExecutiveController');

	// customers
	Route::resource('customers', 'CustomerController');

	// product_categories
	Route::resource('product_categories', 'ProductCategoryController');

	// products
   // Route::resource('products', 'ProductController');
      Route::resource('products', 'ProductController1');
      
	Route::get('/products/show_catalogue/{id}','ProductController@showCatalogue')->name('products/show_catalogue');
	Route::get('/products/catalogue_create/{id}','ProductController@catalogueCreate')->name('products/catalogue_create');
	Route::post('/products/catalogue_store','ProductController@catalogueStore')->name('products/catalogue_store');
	

    // Route::get('/products/catalogue_edit/{id}','ProductController@catalogueEdit')->name('products/catalogue_edit');
    // Route::post('/products/catalogue_update','ProductController@catalogueUpdate')->name('products/catalogue_update');

	// appointments
	/*Route::resource('appointments', 'AppointmentController');

	// meetings
	Route::resource('meetings', 'MeetingController');
	Route::post('/meetings/getMeetings','MeetingController@getMeetings')->name('meetings.getMeetings');
	Route::post('/meetings/startMeeting','MeetingController@startMeeting')->name('meetings.startMeeting');
	Route::post('/meetings/isMeetingRunning','MeetingController@isMeetingRunning')->name('meetings.isMeetingRunning');
	Route::post('/meetings/closeMeeting','MeetingController@closeMeeting')->name('meetings.closeMeeting');

	// celebrity_picks
	Route::resource('celebrity_picks', 'CelebrityPickController');*/

	// slider_images
	Route::resource('slider_images', 'SliderImageController');

	// takeChangeStatusAction
	Route::post('/takeChangeStatusAction', 'AjaxController@takeChangeStatusAction')->name('takeChangeStatusAction');

	// takeDeleteAction
	Route::post('/takeDeleteAction', 'AjaxController@takeDeleteAction')->name('takeDeleteAction');

	// assignExecutiveToCustomer
	Route::post('/assignExecutiveToCustomer', 'AjaxController@assignExecutiveToCustomer')->name('assignExecutiveToCustomer');

        // add multiple Customer
	Route::post('/addMultipleCustomer', 'AjaxController@addMultipleCustomer')->name('addMultipleCustomer');

	// takeBannerChangeAction
	Route::post('/takeBannerChangeAction', 'AjaxController@takeBannerChangeAction')->name('takeBannerChangeAction');

	// takeShowInSliderChangeAction
	Route::post('/takeShowInSliderChangeAction', 'AjaxController@takeShowInSliderChangeAction')->name('takeShowInSliderChangeAction');

	// vendors
	Route::resource('vendors', 'VendorController');

	Route::post('/getstate','AppController@getstate')->name('getstate');
	Route::post('/getcity','AppController@getcity')->name('getcity');

	Route::resource('cms', 'CMSController');

	Route::resource('brands', 'BrandController');

	Route::resource('document_library', 'DocumentLibraryController');

    

// 	Route::post('products/getChildCategory', 'ProductController1@getChildCategory');

    Route::post('/products/categoryAttributeTable', 'AjaxController@categoryAttributeTable')->name('products.categoryAttributeTable');

    Route::post('/products/checkCategoryAttribute', 'AjaxController@checkCategoryAttribute')->name('products.checkCategoryAttribute');

    Route::post('/products/checkProductAttribute', 'AjaxController@checkProductAttribute')->name('products.checkProductAttribute');

	Route::post('logout','Auth\LoginController@logout')->name('logout');

	// tag
	Route::resource('tag', 'TagController');

	// blog
	Route::resource('blog', 'BlogController');

	// blog category
	Route::resource('blog-category', 'BlogCategoryController');

	//order
	Route::get('/order', 'OrderController@index')->name('order.index');

	Route::get('/order/detail/{id}','OrderController@details')->name('order.detail');

    Route::match(['get','post'],'/order/status','OrderController@status')->name('order.status');

	// Testimonial
	Route::resource('testimonial', 'TestimonialController');

	Route::get('/contact_us', 'ContactController@index')->name('contact_us');
	


	Route::resource('community', 'CommunityController');

	 // academy
	 Route::resource('academy', 'AcademyController');

     // attribute
	 Route::resource('attribute', 'AttributeController');

    //  Route::get('/attribute-value/create','AttributeController@createValue')->name('attribute-value.create');

    //  Route::post('/attribute-value/store','AttributeController@storeValue')->name('attribute-value.store');

    Route::get('/update-vendor-product','AppController@updateVendorProduct')->name('update-vendor-product');

    Route::get('/update-product-attribute','AppController@updateProductAttribute')->name('update-product-attribute');

});


// Route::get('/{slug}', 'Front\CmsController@index');



