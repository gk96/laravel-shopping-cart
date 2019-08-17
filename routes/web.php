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

Route::get('/', function () {
    return view('welcome');
});
Route::get('menu','MenuController@index');
Route::get('/product','ProductController@index');

Route::any('/cart','CartController@store')->name('cart');

Route::any('/shoppingcart','CartController@index');

Route::any('/deletecart','CartController@destroy');

Route::get('/mycart/{userid}', 'CartController@index')->name('mycart');


Route::any('/checkout','OrderController@create');

Route::get('/search','ProductController@searchprod' );

Route::any('/confirm','OrderController@store')->name('confirm');
Route::any('/myorders','OrderController@show');
//admin routes
Route::any('/update','ProductController@edit');
Route::any('/prodel','ProductController@destroy');
Route::any('/proedit','ProductController@showone');

Route::get('/orders','ProductController@showorders');
Route::get('/users','HomeController@showuser');
Route::get('/test',function(){
    return view('test');
});
Route::post('/add','ProductController@create');
Route::get('/adminadd', function () {
    return view('adminadd');
});






Auth::routes();

Route::any('/home','HomeController@index');

//Route::get('/adminpanel','ProductController@show');

//edited /home to /
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
    Route::match(['get', 'post'], '/adminOnlyPage', 'HomeController@admin');
    //return view('middleware')->withMessage("Admin");
});

Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function(){
    Route::match(['get', 'post'], '/memberOnlyPage', 'HomeController@member');
   // return redirect('/memberOnlyPage');
});