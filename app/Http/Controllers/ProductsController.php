<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Alert;
class ProductsController extends Controller
{

    /*  Index */
    public function index()
    {
        $products =Product::orderBy('created_at','asc')->get();
        return view('products.index')->with('products',$products);
    }


    /*  Create */
    public function create()
    {
        return view('products.create');
    }


    /*  Store */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'cmimi'=>'required'
        ]);

        // Create products
        $product = new Product;
        $product->name = $request->input('name');
        $product->cmimi = $request->input('cmimi');
        $product->save();
        Alert::success('Produkti u shtua me sukses');
        return redirect('/products')->with('success','Product Created');
    }


    /*  Show */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product',$product);
    }


    /*  Edit */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product',$product);
    }


    /*  Update */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'cmimi'=>'required'
        ]);

        // Update products
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->cmimi = $request->input('cmimi');
        $product->save();
        Alert::success('Produkti u modifikua me sukses');
        return redirect('/products')->with('success','Product Updated');
    }


    /*  Destroy */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Alert::success('Produkti u fshi me sukses');
        return redirect('/products')->with('success','Product Deleted');
    }
}
