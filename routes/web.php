<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/producto/{product}', 'PagesController@producto')->name('producto');
Route::get('/calidad', 'PagesController@calidad')->name('calidad');
Route::get('/descargas', 'PagesController@descargas')->name('descargas');
Route::get('/presupuesto', 'PagesController@solicitudPresupuesto')->name('presupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');

Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');

Route::get('/descargar-archivo/{id}/{reg}', 'ContentController@descargarArchivo')->name('descargar-archivo');
Route::get('/ficha-tecnica/{id}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@storeHomeGenericSection')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@updateHomeGenericSection')->name('home.content.generic-section.update');
    Route::post('home/update', 'HomeController@update')->name('home.update');
    Route::delete('home/content/{id}', 'HomeController@destroyHomeGenericSection')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'HomeController@destroyHomeGenericSection')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    /** Fin company*/

    /** Page Color */
    Route::get('color/content', 'ColorController@content')->name('color.content');
    Route::post('color/content/store', 'ColorController@store')->name('color.content.store');
    Route::post('color/content', 'ColorController@update')->name('color.content.update');
    Route::delete('color/content/{id}', 'ColorController@destroy')->name('color.content.destroy');
    Route::get('color/content/slider/get-list', 'ColorController@getList')->name('color.content.get-list');
    Route::get('color/content/find-color/{id?}', 'ColorController@find')->name('color.content.find-color');
    /** Fin color*/
    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    /** Fin product*/

    /** Page Product variable */
    Route::post('variable-product/content/store', 'VariableProductController@store')->name('variable-product.content.store');
    Route::post('variable-product/content', 'VariableProductController@update')->name('variable-product.content.update');
    Route::delete('variable-product/content/{id}', 'VariableProductController@destroy')->name('variable-product.content.destroy');
    /** Fin product variable*/

    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductController@Imagedestroy')->name('product.image-destroy');
    /** Fin product picture*/

    /** Page Download */
    Route::get('download/content', 'DownloadController@content')->name('download.content');
    Route::post('download/content/store-slider', 'DownloadController@storeSlider')->name('download.content.storeSlider');
    Route::post('download/content/update-slider', 'DownloadController@updateSlider')->name('download.content.updateSlider');
    Route::delete('download/content/{id}', 'HomeController@destroyHomeGenericSection')->name('download.content.destroy');
    Route::get('download/content/slider/get-list', 'DownloadController@sliderGetList')->name('download.slider.get-list');
    /** Fin Download*/

    /** Page Quality */
    Route::get('quality/content', 'QualityController@content')->name('quality.content');
    Route::post('quality/content/update-info', 'QualityController@updateInfo')->name('quality.content.updateInfo');
    /** Fin Quality*/

    /** Page Data */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin Data*/

    /** Page newsletter */
    Route::get('page/content', 'AdminPageController@content')->name('page.content');
    Route::put('page/content', 'AdminPageController@update')->name('page.content.update');
    /** Fin newsletter*/

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
