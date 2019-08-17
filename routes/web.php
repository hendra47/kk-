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
    return redirect('login');
});


Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::resource('home', 'HomeController');

Route::get('/obat-list', 'rekamMedisController@getObat');

Route::get('/tindakan-list', 'rekamMedisController@getTindakan');

Route::resource('pasiens', 'pasiensController');
Route::get('pasiens/{id}/destroy', 'pasiensController@destroy');

Route::resource('users', 'usersController');

Route::resource('daftars', 'daftarsController');
Route::get('daftars/{id}/destroy', 'daftarsController@destroy');

Route::resource('obats', 'obatsController');
Route::get('obats/{id}/destroy', 'obatsController@destroy');

Route::resource('settings', 'settingsController');

Route::resource('groups', 'groupsController');
Route::get('groups/{id}/destroy', 'groupsController@destroy');

Route::resource('biayas', 'biayaController');

Route::resource('pembayarans', 'pembayaranController');

Route::resource('apotek', 'apotekController');

Route::resource('rekamMedis', 'rekamMedisController');

Route::resource('roles', 'rolesController');
Route::get('roles/{id}/destroy', 'rolesController@destroy');

Route::resource('profiles', 'profileController');

Route::resource('laporandftr', 'laporandftrController');
Route::get('/downdftr_pdf/{tglawal}/{tglakhir}','laporandftrController@downdftr_pdf');

Route::resource('laporanobat', 'laporanobatController');
Route::get('/downobat_pdf/{tglawal}/{tglakhir}','laporanobatController@downobat_pdf');

Route::resource('laporandpt', 'laporandptController');
Route::get('/downdpt_pdf/{tglawal}/{tglakhir}','laporandptController@downdpt_pdf');
Route::get('/chart-dpt/{tglawal}/{tglakhir}','laporandptController@makeChart');

Route::resource('tindakan', 'tindakanController');
Route::get('tindakan/{id}/destroy', 'tindakanController@destroy');