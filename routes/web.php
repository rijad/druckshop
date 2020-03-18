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
// Route::get('/page-format','CheckoutController@getPageFormat')->name('page-format');
// Route::get('/cover-color','CheckoutController@getCoverColor')->name('cover-color');
// Route::get('/cover-sheet','CheckoutController@getCoverSheet')->name('cover-sheet');
// Route::get('/back-cover','CheckoutController@getBackCover')->name('back-cover');
Route::get('/get-relations','CheckoutController@getProductAttributes')->name('get-relations');
Route::get('/get-price','CheckoutController@getPrice')->name('get-price');
Route::get('/get-relations-content','CheckoutController@getContentAttributes')->name('get-relations-content');

Route::POST('/order','CheckoutController@saveOrder')->name('order');
Route::POST('/order-details','CheckoutController@orderDetails')->name('order-details');
Route::POST('/set-quantity','CheckoutController@setQuantity')->name('set-quantity');
Route::get('/remove-item/{id}','CheckoutController@removeItem')->name('remove-item');
Route::get('/cart','CheckoutController@cart')->name('cart');


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

// Route::get('/payment-success', function () {
//     return view('paypalsuccess'); 
// })->name('payment-success');

 
Route::get('/payment-fail', function () {
    return view('paypalfail'); 
})->name('payment-fail');
 

Route::get('/payment-success','CheckoutController@paymentPaypalSuccess')->name('payment-success');
// Route::get('/payment-fail','CheckoutController@paymentPaypal')->name('payment-fail');
 
 
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
    return view('/pages/admin/users/loginDashBoard'); 
})->name('dashboard-login');
// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
   
 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('user-login','LoginController@authenticate')->name('user-login');
Route::post('user-register','RegisterController@validateRegister')->name('user-register');
Route::get('/user-logout','LoginController@logout')->name('user-logout');

