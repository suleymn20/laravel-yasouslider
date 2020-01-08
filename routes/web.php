<?php
/*
|--------------------------------------------------------------------------
| Back
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
  Route::get('giris','Back\AuthController@login')->name('login');
  Route::post('giris','Back\AuthController@loginPost')->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
  Route::get('panel','Back\Dashboard@index')->name('dashboard');
  //Makalerler route
  Route::get('sliders/silinenler','Back\SlidersController@trashed')->name('trashed.slider');
  Route::resource('sliders','Back\SlidersController');
  Route::get('/switch', 'Back\SlidersController@switch')->name('switch');
  Route::get('/deleteslider/{id}','Back\SlidersController@delete')->name('delete.slider');
  Route::get('/harddeleteslider/{id}','Back\SlidersController@hardDelete')->name('hard.delete.slider');
  Route::get('/recover/{id}','Back\SlidersController@recover')->name('recover.slider');
  //
  Route::get('cikis','Back\AuthController@logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Front
|--------------------------------------------------------------------------
|
*/

Route::get('/','Front\Homepage@index')->name('homepage');
Route::get('sliderekle','Front\Homepage@slideradd')->name('slider.add');
Route::post('sliderpost','Front\Homepage@sliderpost')->name('slider.post');
