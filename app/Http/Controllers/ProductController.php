<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('id')->paginate(25);
        $brands = Brand::All();
        $categories = Category::All();
        return view('products.index',compact('products','categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create',compact('categories','brands'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'cover'=>'required|image|mimes:png,jpeg,svg,jpg|max:2048',
            'category_id'=>'required',
            'brand_id'=>'required|numeric',
        ]);
        $product = $request->all();
        if(
            $imagen=$request->file('cover')
            ){
            $ruta = 'img/covers/';
            $cover =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$cover);
            $product['cover']="$cover";
        }
        unset($product['category_id']);
        //dd($request->category_id);
        Product::create($product)->categories()->attach($request->category_id);
        return redirect()->route('products.index')->with('success', 'Producto creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = product::find($id);
        $brands = Brand::All();
        $categories = Category::All();
        return view('products.show',compact('product','categories','brands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'brand_id'=>'required|numeric',

        ]);

        if(isset($request['cover'])){
        $request->validate(['cover'=>'image|mimes:png,jpeg,svg,jpg|max:2048']);
        };

        $producto = Product::find($id);
        $product = $request->all();
        if(
            $imagen=$request->file('cover')
            ){
            $ruta = 'img/covers/';
            $cover =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$cover);
            $product['cover']="$cover";
        }
        unset($product['category_id']);
        $producto->categories()->attach($request->category_id);
        $producto->update($product);
        return redirect()->route('products.index')->with('success', 'Producto editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado con exito');;
    }
}
