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

Route::get('/', function () {
    return view('main');
});
Route::group(["prefix" => "/admin", 'as' => 'admin', 'middleware' => 'auth'], function () {

    Route::get("/gallery/order", [
        'as' => 'admin.order',
        'uses' => "Admin\\GalleryController@order"
    ]);
    Route::resource('/gallery', "Admin\\GalleryController");

    Route::get('/', 'Admin\PagesController@index');


    Route::resource('/pages', 'Admin\PagesController');

    Route::post('/pages/search', 'Admin\PagesController@search');

    Route::resource('/categories', 'Admin\CategoriesController');

    Route::post('/categories/search', 'Admin\CategoriesController@search');

    Route::get('/home', 'HomeController@index')->name('home');

    /// slavik

    Route::post('/', 'Admin\\QuoteController@store');

    Route::get('/quote', 'Admin\\QuoteController@quote');

    Route::get('/quote/deleted/{id}', 'Admin\\QuoteController@deleted');

    Route::post('/quote/edite', 'Admin\\QuoteController@edited');

    Route::get('/quote/searcch', 'Admin\\QuoteControllers@searcch');

    Route::get('/project', 'Admin\\ProgectsControllers@index');

    Route::post('/project/store', 'Admin\\ProgectsControllers@store');

    Route::post('/project/save/{id}', 'Admin\\ProgectsControllers@save');

    Route::get('/project/delete/{id}', function (\App\project $id) {
        $id->delete();
        return redirect('/admin/project');
    });

});

Auth::routes();

