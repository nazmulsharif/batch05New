<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\PagesController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\LogoController;
use App\Http\Controllers\BackEnd\SliderController;
use App\Http\Controllers\BackEnd\HomeAboutSectionController;
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
  Route::prefix('logo')->group(function(){
    Route::get('/manage',[logoController::class, 'index'])->name('logo.manage');
    Route::get('/create',[logoController::class, 'create'])->name('logo.create');
    Route::post('/store',[logoController::class, 'store'])->name('logo.store');
    Route::get('/edit/{id}',[logoController::class, 'edit'])->name('logo.edit');
    Route::post('/update/{id}',[logoController::class, 'update'])->name('logo.update');
    Route::get('/delete/{id}',[logoController::class, 'destroy'])->name('logo.delete');
    Route::get('statusChange/{id}/{status}',[logoController::class, 'statusChange'])->name('logo.status.change');

  });
   Route::prefix('slider')->group(function(){
    Route::get('/manage',[SliderController::class, 'index'])->name('slider.manage');
    Route::get('/create',[SliderController::class, 'create'])->name('slider.create');
    Route::post('/store',[SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{id}',[SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/update/{id}',[SliderController::class, 'update'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class, 'destroy'])->name('slider.delete');
    Route::get('statusChange/{id}/{status}',[SliderController::class, 'statusChange'])->name('Slider.status.change');

  });
    Route::prefix('aboutSection')->group(function(){
        Route::get('/manage',[HomeAboutSectionController::class, 'index'])->name('aboutSection.manage');
        Route::get('/create',[HomeAboutSectionController::class, 'create'])->name('aboutSection.create');
        Route::post('/store',[HomeAboutSectionController::class, 'store'])->name('aboutSection.store');
        Route::get('/edit/{id}',[HomeAboutSectionController::class, 'edit'])->name('aboutSection.edit');
        Route::post('/update/{id}',[HomeAboutSectionController::class, 'update'])->name('aboutSection.update');
        Route::get('/delete/{id}',[HomeAboutSectionController::class, 'destroy'])->name('aboutSection.delete');
        Route::get('statusChange/{id}/{status}',[HomeAboutSectionController::class, 'statusChange'])->name('Slider.status.change');

    });



 /*---Backend Routes End ------------ --------------------*/










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

