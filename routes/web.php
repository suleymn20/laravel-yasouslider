<?php
/*
|--------------------------------------------------------------------------
| Back
|--------------------------------------------------------------------------
|
*/

Route::get('admin/panel','Back\Dashboard@index')->name('admin.dashboard');
Route::prefix('admin')->name('admin.')->group(function(){
  Route::get('giris','Back\AuthController@login')->name('login');
  Route::post('giris','Back\AuthController@loginPost')->name('login.post');
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
