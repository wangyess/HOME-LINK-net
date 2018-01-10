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

Route::any('/a/{model}/{action}', function ($model,$action) {
    $klass= '\App\Http\Controllers\\'.$model.'Controller';
    return (new $klass($model))->$action();
});
Route::any('/',function (){
   return view('home');
});
Route::any('/admin/{page}',function ($page){
    return view("admin.$page");
});