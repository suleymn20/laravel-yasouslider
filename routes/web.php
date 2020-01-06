<?php

/*
|--------------------------------------------------------------------------
| Front
|--------------------------------------------------------------------------
|
*/

Route::get('/','Front\Homepage@index')->name('homepage');
Route::get('sliderekle','Front\Homepage@slideradd')->name('slider.add');
Route::post('sliderpost','Front\Homepage@sliderpost')->name('slider.post');
