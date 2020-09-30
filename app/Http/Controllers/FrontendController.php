<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $newProducts = Product::where('active', 1)
                            ->orderBy('id', 'DESC')
                            ->take(9)
                            ->get();
    return view('frontEnd.home.index',['newProducts'=>$newProducts]);
  }
  public function brandProduct()
  {

    return view('frontEnd.home.index');
  }
  public function categoryProduct($id)
  {

    $category_products = DB::table('products')
                              ->where('products.active', 1)
                              ->where('category_id',$id)
                              ->join('categories','categories.id','products.category_id')
                              ->join('brands','brands.id','products.brand_id')
                              ->select('products.*','categories.category_name','brands.brand_name')
                              ->get();

    // return $category_products;

    return view('frontEnd.pages.categoryProduct',['category_products'=>$category_products]);
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
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
}
