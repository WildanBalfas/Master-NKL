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
Route::group(['middleware'=>'auth'],function(){

    Route::get('/', function () {
        return view('home');
    });

    Route::group(['middleware'=>['auth','checkrole:admin']],function(){
    //Users
    Route::get('/view-user','usersController@showUser')->name('view.user');
    Route::get('/register','usersController@form')->name('register.form');
    Route::post('/registerStore', 'usersController@createUser')->name('register.store');
    Route::get('/{id}/edit-user', 'usersController@editUser')->name('user.edit');
    Route::put('/{id}/update-user', 'usersController@updateUser')->name('user.update');
    Route::get('/{id}/delete-user', 'usersController@deleteUser')->name('user.delete');

    // clients
    Route::get('/input-client', 'clientController@inputClient');
    Route::get('/view-client', 'clientController@viewClient');
    Route::get('/{id}/edit', 'clientController@editClient');
    Route::post('/input-client', 'clientController@insertClient');
    Route::get('/{id}/delete', 'clientController@deleteClient');
    Route::put('/{id}/update', 'clientController@updateClient');
    });

    Route::group(['middleware'=>['auth','checkrole:admin,client']],function(){
    //audits
    Route::get('/input-audit', 'auditController@inputAudit')->name('audit.index');
    Route::get('/view-audit', 'auditController@viewAudit')->name('audit.view');
    Route::post('/input-audit', 'auditController@insertAudit')->name('audit.post');
    Route::get('/{id}/edit-audit', 'auditController@editAudit')->name('audit.edit');
    Route::put('/{id}/update-audit', 'auditController@updateAudit')->name('audit.update');
    Route::get('/{id}/delete-audit', 'auditController@deleteAudit')->name('audit.delete');
    Route::get('/audit-data/{id}', 'auditController@ajaxAudit')->name('audit.ajax');

    Route::resource('v-legal-header', 'LegalHeaderController');
    Route::resource('v-legal-detail', 'LegalDetailController');
    Route::get('/header/audit-data/{id}', 'LegalHeaderController@ajaxAudit')->name('header.ajax.audit');
    Route::get('v-legal-detail/add/{id}', 'LegalDetailController@create')->name('v-legal-detail.buat');
    Route::get('v-legal-detail/delete/{id}', 'LegalDetailController@destroy')->name('v-legal-detail.hapus');
    Route::post('v-legal-detail/update/{id}', 'LegalHeaderController@update')->name('vlh.update');
    Route::get('/v-legal-header/excel/{id}', 'LegalHeaderController@excel')->name('vlh.excel');
    Route::get('v-legal-header/delete/{id}', 'LegalHeaderController@destroy')->name('v-legal-header.hapus');
    Route::post('v-legal/kirim/{id}', 'LegalHeaderController@kirim')->name('vlh.kirim');
    Route::post('v-legal/batal/{id}', 'LegalHeaderController@batal')->name('vlh.batal');
    });    
});


    //Authentication
    Route::get('/login', 'authController@login')->name('login');
    Route::post('/postlogin', 'authController@postlogin');
    Route::get('/logout', 'authController@logout');
