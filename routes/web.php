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

    Route::group(['middleware' => 'auth'], function() {

            // いままで定義してきたルート
            Route::get('/', 'HomeController@index')->name('home');
    
            Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    
            Route::post('/folders/create', 'FolderController@create');
            
            Route::group(['middleware' => 'can:view,folder'], function() {
    
                Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
    
                Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
                Route::post('/folders/{folder}/tasks/create', 'TaskController@create');
    
                Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
                Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
    
        });
    });
    Route::get('/test-error',function(){
        abort(500);
    });
    Auth::routes();


// // お問い合わせフォーム
Route::get('/contact', 'ContactController@index')->name('contact.index');
// // 確認ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');
// // 送信完了ページ
Route::post('/contact/send', 'ContactController@send')->name('contact.send');




