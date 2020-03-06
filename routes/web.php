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

Route::get('/latest','LatestController@index')->name('latest');
Route::get('/about-us','AboutController@index')->name('about-us');
Route::get('/faq','FaqController@index')->name('faq');
Route::get('/contact','ContactController@index')->name('contact');

Route::POST('/upload-file','UploadfileController@uploadFile')->name('upload-file');
Route::POST('/remove-file','UploadfileController@removeFile')->name('remove-file');
      

Route::get('/coming-soon', function () {
    return view('coming-soon'); 
})->name('coming-soon');
 
Route::get('/cart', function () {
    return view('/pages/front-end/cart'); 
})->name('cart');


//Admin
Route::group(['namespace'=>'Admin', 'prefix' => 'admin'], function()
{
Route::get('/dashboard','HomeController@index')->name('dashboard');
});


// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
   
 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('user-login','LoginController@authenticate')->name('user-login');
Route::post('user-register','RegisterController@validateRegister')->name('user-register');
Route::get('/user-logout','LoginController@logout')->name('user-logout');

