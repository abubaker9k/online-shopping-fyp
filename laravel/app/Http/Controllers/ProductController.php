<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.shop');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $product = new Product;
    $product->product_name = $request->input('product_name');
    $product->category = $request->input('category');

    // Store product image
    if ($request->hasFile('product_image')) {
        $product->product_image = $request->file('product_image')->store('uploads', 'public');
    }

    // Store product video
    if ($request->hasFile('product_video')) {
        $product->product_video = $request->file('product_video')->store('uploads', 'public');
    }

    // Store product 3D model
    // Store product 3D model
    if ($request->hasFile('product_model')) {
        $path = $request->file('product_model')->store('uploads', 'public');
        $product->product_model = $path;
    }

    // if ($request->hasFile('product_model')) {
    //     $product->product_3d_model = $request->file('product_model')->store('uploads', 'public');
    // }

    $product->save();
    return view('welcome');
}



    // public function store(Request $request)
    // {

    //     $product = new Product;
    //     $product-> product_name = $request['product_name'];
    //     $product-> category = $request['category'];
    //     $product->product_image = $request->file('product_image')->store('uploads', 'public');

    //     $product->save();
    //     return view('welcome');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::find($id);
        $data = compact('product');
        return view('shop.individual')->with($data);
    }

    public function show_cart($id)
    {

        $product = Product::find($id);
        $data = compact('product');
        return view('shop.cart')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '' ) {
            $product = Product::where('product_name','LIKE',"%$search%")->orWHERE('category','LIKE',"%$search%")->get();
        }
        else {
            $product = Product::all();
        }

        $data = compact('product','search');
        return view('shop.shop')->with($data);
    }

    public function home_view(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '' ) {
            $product = Product::where('product_name','LIKE',"%$search%")->orWHERE('category','LIKE',"%$search%")->get();
        }
        else {
            $product = Product::all();
        }

        $data = compact('product','search');
        return view('welcome')->with($data);
    }
    public function store3d(Request $request)
    {
        $product = new Product;

        // Store product 3D model
        if ($request->hasFile('product_model')) {
            $path = $request->file('product_model')->store('uploads', 'public');
            $product->product_model = $path;
        }

        $product->save();
        return view('welcome');
    }
}
