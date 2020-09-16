<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use \App\Models\Produk;


class ColController extends Controller{
    public function index(){
        return view('index');
    }
    public function profile(){
        // $product = DB::table('products')->get(); //bikin var akses databasenya
        // dump($product);

        
        $product = Produk::all();
        return view('other.profile',['product'=>$product]);
                    //tampilin di page profile //isi product dengan var product yg isinya akses database
    }

    public function about(){
        return view('other.about');
    }
}