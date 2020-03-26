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
Route::POST('/orders-details','CheckoutController@orderDetails')->name('orders-details');
Route::POST('/set-quantity','CheckoutController@setQuantity')->name('set-quantity');
Route::get('/remove-item/{id}','CheckoutController@removeItem')->name('remove-item');
Route::POST('/paper-weight-sheets','CheckoutController@paperWeightSheets')->name('paper-weight-sheets');

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

Route::get('/gallery-images','Admin\GalleryController@gallery')->name('gallery-images');
Route::get('/free-sample','Admin\FreeSampleController@create')->name('free-sample');
Route::post('/free_sample_request','Admin\FreeSampleController@store')->name('free_sample_request');

Route::get('/payment-success','CheckoutController@paymentPaypalSuccess')->name('payment-success');

 
 
//Admin
Route::group(['namespace'=>'Admin', 'prefix' => 'admin' ], function()
{
Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::resource('/slider','SliderController');
Route::get('/users','AdminUsersController@index')->name('users');
Route::get('/create-user','AdminUsersController@create')->name('create-user');
Route::post('/store-user','AdminUsersController@store')->name('store-user');
Route::get('/edit-user/{id}','AdminUsersController@edit')->name('edit-user');
Route::get('/update-user/{id}','AdminUsersController@update')->name('update-user');
Route::post('/delete-user','AdminUsersController@destroy')->name('delete-user');
Route::resource('/slider','SliderController');

//Parameters
Route::resource('/parameter','ParameterController');
Route::get('/details/{model}/{id}','ParameterController@details')->name('details');
Route::resource('/covercolor','CoverColorController');
Route::resource('/coversheet','CoverSheetController');
Route::resource('/backcover','BackCoverController');
Route::resource('/cdbag','CdBagController');
Route::resource('/datacheck','DataCheckController');
Route::resource('/art','ArtController');
Route::resource('/discount','DiscountController');
Route::resource('/gallery','GalleryController');
Route::get('/details/{model}/{id}','ParameterController@details')->name('details'); 

//order
Route::get('/order','OrderController@index')->name('order');
Route::get('/order-details/{order_id}','OrderController@edit')->name('order-details');
Route::post('/order-edit/{id}','OrderController@update')->name('order-edit');

Route::resource('/FAQ','FAQController');
Route::resource('/product','ProductController');
Route::get('/payment','PaymentController@index')->name('payment');
Route::get('/delivery','DeliveryController@index')->name('delivery');

//free sample
Route::get('/freesample','FreeSampleController@index')->name('freesample');
Route::get('/freesample-details/{id}','FreeSampleController@edit')->name('freesample-details');
Route::post('/freesample-edit/{id}','FreeSampleController@update')->name('freesample-edit');


Route::post('/dashboard-login-data','LoginController@authenticate')->name('dashboard-login-data');
Route::get('/dashboard-logout-data','LoginController@logout')->name('dashboard-logout-data');

 
//Parameters Route :Sachin
Route::resource('/deliveryService','DeliveryController');
Route::resource('/paper','PaperController');

});
  

Route::get('/dashboard-login', function () {
    return view('/pages/admin/users/loginDashBoard'); 
})->name('dashboard-login');
// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
   
 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('user-login','LoginController@authenticate')->name('user-login');
Route::post('user-register','RegisterController@validateRegister')->name('user-register');
Route::post('/user-logout','LoginController@logout')->name('user-logout');





