<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ControllerProduk extends Controller
{
    public function TambahProduk(Request $request){
    	$Produk = new Produk();
    	$Produk->nama = $request->input('nama');
    	$Produk->deskripsi = $request->input('deskripsi');
    	$Produk->kategori = $request->input('kategori');
    	$Produk->stok = $request->input('stok');
    	$Produk->harga = $request->input('harga');
    	$Produk->image_url = $request->input('image_url');
    	$Produk->save();

    	return redirect('UIProduk');//buat diroutes buat ngakses diwebnya nnti
    }

    public function readAll(){
    	$Produk = Produk::all();
    }

    public function search(){
    	$Produk = Produk::where([['nama','=',$nama],['kategori','=',$kategori]])->first();
    	return $Produk;
    }

    public function updateProduk(Request $request,$id){
    	$Produk = $Produk::where('id',$request->input('id'));
    	$Produk->nama = $request->input('nama');
    	$Produk->deskripsi = $request->input('deskripsi');
		$Produk->kategori = $request->input('kategori');
    	$Produk->stok = $request->input('stok');
    	$Produk->harga = $request->input('harga');
    	$Produk->image_url = $request->input('image_url');
    	$Produk->save();   

    	return redirect('UIProduk'); 	
    }

    public function deleteProduk ($id){
    	$Produk = Produk::where('id',$id);
    	$Produk->delete();

    	return redirect('UIProduk'); 
    }
}
