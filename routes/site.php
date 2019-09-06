<?php

Route::group(['middleware' => ['web', 'account.enabled']], function()
{
    Route::get('/', 'PagesController@home');
    Route::get('article/{slug}', 'PagesController@articleDetails');
    Route::get('articles', 'PagesController@listArticles');
    Route::get('articles/search', 'PagesController@search');
    Route::get('articles/category/{slug}', 'PagesController@listByCategory');
    Route::get('articles/tag/{slug}', 'PagesController@listByTag');
    Route::get('category/{slug}', 'PagesController@listByCategory');

});

Route::get('error', 'PagesController@error');
