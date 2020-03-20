<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' ); 

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache: 
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>'; 
});

Route::get('/', 'IndexController@sendData')->name('index');
Route::get('/products', 'ProductController@sendData')->name('products');
Route::get('/product-information', 'ProductInfoController@sendData')->name('product-information');
Route::POST('/news-letter','NewsLetterController@sendData')->name('news-letter');
Route::get('/checkout','CheckoutController@sendData')->name('check-out');
Route::get('/get-relations','CheckoutController@getProductAttributes')->name('get-relations');
Route::get('/get-price','CheckoutController@getPrice')->name('get-price');
Route::get('/get-relations-content','CheckoutController@getContentAttributes')->name('get-relations-content');

Route::POST('/product-order','CheckoutController@saveOrder')->name('product-order');
Route::POST('/order-details','CheckoutController@orderDetails')->name('order-details');
Route::POST('/set-quantity','CheckoutController@setQuantity')->name('set-quantity');
Route::get('/remove-item/{id}','CheckoutController@removeItem')->name('remove-item');
Route::get('/cart','CheckoutController@cart')->name('cart');
Route::get('/customer-area','CustomerAreaController@index')->name('customer-area');
Route::get('/repeat-order/{order_id}','RepeatOrderController@RepeatOrder')->name('repeat-order');
Route::get('/cancel-order/{order_id}','CancelOrderController@CancelOrder')->name('cancel-order');


Route::get('/latest','LatestController@index')->name('latest');
Route::get('/about-us','AboutController@index')->name('about-us');
Route::get('/faq','FaqController@index')->name('faq');
Route::get('/contact','ContactController@index')->name('contact');


Route::POST('/upload-file','UploadfileController@uploadFile')->name('upload-file');
Route::POST('/remove-file','UploadfileController@removeFile')->name('remove-file');
Route::get('/coming-soon', function () {
    return view('coming-soon'); 
})->name('coming-soon');

 
// Payment

Route::get('/payment-paypal','CheckoutController@paymentPaypal')->name('payment-paypal');

Route::get('/cash-on-delivery','CheckoutController@cashOnDelivery')->name('cash-on-delivery');
 
Route::get('/payment-fail', function () {
    return view('paypalfail'); 
})->name('payment-fail');
 
Route::get('/payment-success','CheckoutController@paymentPaypalSuccess')->name('payment-success');

 
 
//Admin
Route::group(['namespace'=>'Admin', 'prefix' => 'admin' ], function()
{
Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::resource('/slider','SliderController'); 
Route::resource('/users','AdminUsersController');
// Route::get('/slider','SliderController@index')->name('slider');
// Route::post('/slider-edit','SliderController@edit')->name('slider-edit');
Route::get('/parameter','ParameterController@index')->name('parameter');


Route::resource('/slider','SliderController');
Route::resource('/parameter','ParameterController');
Route::get('/details/{model}/{id}','ParameterController@details')->name('details'); 

Route::get('/order','OrderController@index')->name('order');
Route::resource('/FAQ','FAQController');
Route::resource('/product','ProductController');
Route::get('/payment','PaymentController@index')->name('payment');
Route::get('/delivery','DeliveryController@index')->name('delivery');
Route::get('/freesample','FreeSampleController@index')->name('freesample');
Route::post('/dashboard-login-data','LoginController@authenticate')->name('dashboard-login-data');
Route::get('/dashboard-logout-data','LoginController@logout')->name('dashboard-logout-data');

});
  

Route::get('/dashboard-login', function () {
    return view('/pages/admin/adminusers/loginDashBoard'); 
})->name('dashboard-login');
// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
   
 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('user-login','LoginController@authenticate')->name('user-login');
Route::post('user-register','RegisterController@validateRegister')->name('user-register');
Route::post('/user-logout','LoginController@logout')->name('user-logout');

