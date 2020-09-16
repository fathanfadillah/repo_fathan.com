<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index',compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        // $products = new Product;
        // $products->nama = $request->nama;
        // $products->storage = $request->storage;
        // $products->harga = $request->harga;

        // $products->save();
        
        // Product::create([
        //     'nama' => $request->nama,
        //     'storage' => $request->storage,
        //     'harga' => $request->harga
        // ]);
        $request->validate([
            'nama'=>'required',
            'storage'=>'required',
            'harga'=>'required'
        ]);

        Product::create($request->all());
           
        return redirect('/product')->with('status','BERHASIL NAMBAH');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view("products.edit",compact('product')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'nama'=>'required',
            'storage'=>'required',
            'harga'=>'required'
        ]);

        Product::where('id',$product->id)->update([
            'nama'=>$request->nama,
            'storage'=>$request->storage,
            'harga'=>$request->harga
        ]);

        return redirect('/product')->with('status','BERHASIL DIUBAH');
        
    }
    // public function update(Request $request, Product $product)
    // {
    //     //
    //     return 'tes';
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        Product::destroy($product->id);
        return redirect('/product')->with('status','DATA DIHAPUS');
    }
}
