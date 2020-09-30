<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $brands = Brand::all();
    return view('backend.brand.manageBrand', ['brands' => $brands]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('backend.brand.addBrand');
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
      'brand_name' => 'required|max:100|min:1',
      'brand_description' => 'required',
      'active' => 'required',
    ]);
  }

  public function store(Request $request)
  {
    $this->infoValidate($request);

    $brand = new Brand();
    $brand->brand_name = $request->brand_name;
    $brand->brand_description = $request->brand_description;
    $brand->active = $request->active;
    $brand->save();
    $message = "Brand added successfully";
    return redirect('brand/add')->with('message', $message);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function active($id)
  {
    $brand = Brand::find($id);


    if ($brand->active) {

      $brand->active = 0;
    } else {

      $brand->active = 1;
    }

    $brand->save();
    return redirect()->back();
  }

  public function edit($id)
  {
    $brand = Brand::find($id);
    return view('backend.brand.editBrand',['brand'=>$brand]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $brand = Brand::find($request->brand_id);

    $brand->brand_name = $request->brand_name;
    $brand->brand_description = $request->brand_description;
    $brand->active = $request->active;
    $brand->save();
    $message = "Brand updated successfully";
    return redirect('brand/manage')->with('message', $message);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $brand = Brand::find($id);
    $brand->delete();
    return redirect('brand/manage')->with('message', 'Brand deleted successfully');
  }
}
