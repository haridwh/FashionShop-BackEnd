<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ControllerProduk extends BaseResController
{

    public function getAllProduk(){
      $produk = Produk::all();
      return $this->jsonResponse('SUCCESS_GET', 'OK', $produk);
    }

    public function getDetailProduk($id){
      $produk = Produk::find($id);
      if ($produk == null) {
        return $this->jsonResponse('FAILURE_GET', $id.' NOT FOUND', null);
      }
      return $this->jsonResponse('SUCCESS_GET','OK',$produk);
    }

    public function tambahProduk(Request $request){
       $produk = new Produk();
       $produk->nama = $request->input('nama');
       $produk->deskripsi = $request->input('deskripsi');
       $produk->kategori = $request->input('kategori');
       $produk->stok = $request->input('stok');
       $produk->harga = $request->input('harga');
       $produk->save();

       $id = $produk->id;
       $fileName = $id.'.'.$request->file('image')->guessExtension();
       $request->file('image')->move(public_path('/imageProduct'),$fileName);
       $produk->image_url = $fileName;
       $produk->save();

       return $this->jsonResponse('SUCCESS_POST','OK',null);
    }

    public function updateStok(Request $request, $id){
      $produk = Produk::find($id);
      if ($produk == null) {
        return $this->jsonResponse('FAILURE_GET', $id.' NOT FOUND',$produk);
      }
      $produk->stok += $request->input('stok');
      $produk->save();
      return $this->jsonResponse('SUCCESS_POST','OK',null);
    }

    public function updateProduk(Request $request, $id){
    	$produk = Produk::find($id);
      if ($produk == null) {
        return $this->jsonResponse('FAILURE_GET', $id.' NOT FOUND',$produk);
      }
    	$produk->nama = $request->input('nama');
    	$produk->deskripsi = $request->input('deskripsi');
		  $produk->kategori = $request->input('kategori');
    	$produk->stok = $request->input('stok');
    	$produk->harga = $request->input('harga');
    	//$produk->image_url = $request->input('image_url');
    	$produk->save();
    	return $this->jsonResponse('SUCCESS_POST','OK',null);
    }

    public function updateImage(Request $request, $id)
    {

      $fileName = $id.'.'.$request->file('image')->guessExtension();
      $request->file('image')->move(public_path('/imageProduct'),$fileName);
      $produk = Produk::find($id);
      $produk->image_url = $fileName;
      $produk->save();

      return $this->jsonResponse('SUCCESS_POST','OK',null); 
    }

    public function deleteProduk ($id){
    	Produk::destroy($id);
    	return $this->jsonResponse('SUCCESS_DELETE','OK',null);
    }
}
