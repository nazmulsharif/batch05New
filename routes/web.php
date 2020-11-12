<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\PagesController;
use App\Http\Controllers\BackEnd\UserController;
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


 /*---FrontEnd Routes Start ------------ --------------------*/
  Route::get('/',[PagesController::class,'index'])->name('frontEnd.home');

 Route::prefix('frontEnd')->group(function(){
 	
	 Route::get('about-us',[PagesController::class,'about'])->name('frontEnd.about_us');
	 Route::get('services',[PagesController::class,'services'])->name('frontEnd.services');
	 Route::get('blog',[PagesController::class,'blog'])->name('frontEnd.blog');
	 Route::get('contact',[PagesController::class,'contact'])->name('frontEnd.contact');
 });

 /*---------------------FrontEnd Routes End ------------ */

 /*---Backend Routes Start ------------ --------------------*/

  Route::get('/admin',function(){
  	return view('backEnd.pages.home');
  });

  Route::prefix('user')->group(function(){
  	Route::get('/manage',[UserController::class, 'index'])->name('user.manage');
  	Route::get('/create',[UserController::class, 'create'])->name('user.create');
  	Route::post('/store',[UserController::class, 'store'])->name('user.store');
  	Route::get('/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
  	Route::post('/update/{id}',[UserController::class, 'update'])->name('user.update');
  	Route::get('/delete/{id}',[UserController::class, 'destroy'])->name('user.delete');

  });


 /*---Backend Routes End ------------ --------------------*/










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
