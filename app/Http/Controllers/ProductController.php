<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use DB;
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
    // $products = Product::where('active', 1)->get();
    $products = DB::table('products')
      ->join('brands', 'brands.id', 'products.brand_id')
      ->join('categories', 'categories.id', 'products.category_id')
      ->select('products.*', 'categories.category_name', 'brands.brand_name')
      ->get();
    return view('backend.product.manageProduct', ['products' => $products]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::where('active', 1)->get();
    $brands = Brand::where('active', 1)->get();
    return view('backend.product.addProduct', ['categories' => $categories, 'brands' => $brands]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  protected function infoValidate($request)
  {
    $validateData = $request->validate([
      'product_name' => 'required|max:100|min:1',
      'brand_id' => 'required',
      'category_id' => 'required',
      'product_price' => 'required',
      'product_quantity' => 'required',
      'short_description' => 'required',
      'long_description' => 'required',
      // 'product_image' => 'required',
      'active' => 'required',
    ]);
  }
  protected function imageUpload($request)
  {
    $product_image = $request->file('product_image');
    $img_ext = $product_image->getClientOriginalExtension();
    $image_name = $request->product_name . '_' . hexdec(uniqid()) . '.' . $img_ext;
    $directory = 'product_images/';
    $img_url = $directory . $image_name;
    $product_image->move($directory, $image_name);
    return $img_url;
  }
  protected function infoUpload($request, $product, $img_url)
  {
    $product->product_name = $request->product_name;
    $product->brand_id = $request->brand_id;
    $product->category_id = $request->category_id;
    $product->product_price = $request->product_price;
    $product->product_quantity = $request->product_quantity;
    $product->short_description = $request->short_description;
    $product->long_description = $request->long_description;
    $product->product_image = $img_url;
    $product->active = $request->active;
    $product->save();
  }

  public function store(Request $request)
  {


    $this->infoValidate($request);

    $product = new Product();

    $img_url = $this->imageUpload($request);

    $this->infoUpload($request, $product, $img_url);

    $message = "Product added successfully";
    return redirect('product/add')->with('message', $message);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function active($id)
  {
    $product = Product::find($id);


    if ($product->active) {

      $product->active = 0;
    } else {

      $product->active = 1;
    }

    $product->save();
    return redirect()->back();
  }



  public function edit($id)
  {
    $product = Product::find($id);
    $categories = Category::where('active', 1)->get();
    $brands = Brand::where('active', 1)->get();
    return view('backend.product.editProduct', ['product' => $product, 'categories' => $categories, 'brands' => $brands]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $this->infoValidate($request);
    $product = Product::find($request->product_id);

    if ($request->file('product_image')) {
      unlink($product->product_image);
      $img_url = $this->imageUpload($request);
    } else {
      $img_url = $product->product_image;
    }


    $this->infoUpload($request, $product, $img_url);

    return redirect('product/manage')->with('message', 'Product Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $product = Product::find($id);
    unlink($product->product_image);
    $product->delete();
    return redirect('product/manage')->with('message', 'Product deleted successfully');
  }
}
