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

Route::group(['prefix'=>'api', 'middleware'=>'cors'], function(){

  Route::group(['middleware' => 'jwt.auth'], function(){

  });

  //login
  Route::post('/getToken','AuthController@login');

  //Produk
  Route::get('/produk', 'ControllerProduk@getAllProduk');
  Route::get('/produk/{id}', 'ControllerProduk@getDetailProduk');
  Route::post('/produk', 'ControllerProduk@tambahProduk');
  Route::put('/produk/updateStok/{id}', 'ControllerProduk@updateStok');
  Route::put('/produk/updateProduk/{id}', 'ControllerProduk@updateProduk');
  Route::post('/produk/updateImage/{id}', 'ControllerProduk@updateImage');
  Route::delete('/produk/{id}', 'ControllerProduk@deleteProduk');

  //User
  Route::get('/user', 'ControllerUsers@getAllUser');
  Route::get('/user/{id}', 'ControllerUsers@getDetailUser');
  Route::post('/registrasiPenjual', 'ControllerUsers@registrationPenjual');
  Route::post('/registrationPembeli', 'ControllerUsers@registrationPembeli');

  //Transaksi
  Route::get('/transaksi', 'ControllerTransaksi@getAllVerify');
  Route::get('/transaksi/delivery', 'ControllerTransaksi@getAllDelivery');
  Route::get('/transaksi/{id}', 'ControllerTransaksi@getAllTransaksiByID');
  Route::get('/transaksi/cart', 'ControllerDetailTransaksi@getCart');
  Route::get('transaksi/detail/{id}', 'ControllerTransaksi@getAllDetailTransaksi');
  Route::post('/masukKeranjang', 'ControllerTransaksi@createCart');
  Route::put('/createTransaksi/{id}', 'ControllerTransaksi@createTransaksi');
  Route::put('/transaksi/verified/{id}', 'ControllerTransaksi@verified');
  Route::put('/transaksi/arrived/{id}', 'ControllerTransaksi@arrived');
  Route::delete('/transaksi/{id}', 'ControllerTransaksi@deleteTransaksi');
});
