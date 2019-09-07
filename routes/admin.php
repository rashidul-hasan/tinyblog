<?php

Route::group(['prefix' => 'admin'], function(){
    Auth::routes();
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function()
{
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');;
    Route::get('dashboard/count', 'DashboardController@count');
    Route::resource('articles', 'ArticleController');
    Route::resource('tags', 'TagController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UsersController')->except([
        'create', 'store'
    ]);
    Route::get('send-email', 'EmailController@showEmailForm');
    Route::post('send-email', 'EmailController@sendEmail');

    Route::get('backup', 'BackupController@index');
    Route::get('backup-db', 'BackupController@store');
    Route::resource('settings', 'SettingsController')->except([
        'create',
    ]);
});
