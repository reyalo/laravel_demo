<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();
    return view('backend.category.manageCategory', ['categories' => $categories]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('backEnd.category.addCategory');
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
      'category_name' => 'required|max:100|min:1',
      'category_description' => 'required',
      'active' => 'required',
    ]);
  }

  public function store(Request $request)
  {
    $this->infoValidate($request);

    $category = new Category();
    $category->category_name = $request->category_name;
    $category->category_description = $request->category_description;
    $category->active = $request->active;
    $category->save();
    $message = "Category added successfully";
    return redirect('category/add')->with('message', $message);
    // return redirect('category/add')->with(['message'=>'Category added successfully']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function active($id)
  {
    $category = Category::find($id);


    if ($category->active) {
      $category->active = 0;
    } else {
      $category->active = 1;
    }

    $category->save();
    return redirect()->back();
  }

  public function edit($id)
  {
    $category = Category::find($id);
    return view('backend.category.editCategory', ['category' => $category]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $category = Category::find($request->category_id);

    $category->category_name = $request->category_name;
    $category->category_description = $request->category_description;
    $category->active = $request->active;
    $category->save();
    $message = "Category updated successfully";
    return redirect('category/manage')->with('message', $message);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    $category->delete();
    return redirect('category/manage')->with('message','Category deleted successfully');
  }
}
