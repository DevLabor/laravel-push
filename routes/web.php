<?php

Route::post('/user/push_devices', 'HomeController@store')->name('user.push_devices.store');
Route::delete('/user/push_devices', 'HomeController@destroy')->name('user.push_devices.destroy');
