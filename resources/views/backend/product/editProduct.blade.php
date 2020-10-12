@extends('backEnd.master')
@section('title')
Edit Product
@endsection
@section('content')
<h5 class="text-right text-success">{{ Session::get('message') }}</h5>
<div class="container">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center text-primary">Edit Product</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <table class="table">
            <tr>
              <th>Product Name:</th>
              <td><input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control"></td>
              <td><input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control"></td>
            </tr>
            <tr>
              <th>Brand Name:</th>
              <td>
                <select name="brand_id" class="form-control" id="">
                  @foreach ($brands as $brand)
                  <option value="{{ $brand->id }}" {{ $brand->id==$product->brand_id ? 'selected':'' }}>
                    {{ $brand->brand_name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <th>Category Name:</th>
              <td>
                <select name="category_id" class="form-control" id="">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id==$product->category_id ? 'Selected':'' }}>
                    {{ $category->category_name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <th>Product Price:</th>
              <td><input type="number" name="product_price" value="{{ $product->product_price }}" class="form-control">
              </td>
            </tr>
            <tr>
              <th>Product Quantity:</th>
              <td><input type="number" name="product_quantity" value="{{ $product->product_quantity }}"
                  class="form-control"></td>
            </tr>
            <tr>
              <th>Product Shortdescription:</th>
              <td><textarea name="short_description" class="form-control" id="
                  " cols="30" rows="5">{{ $product->short_description }}</textarea></td>
            </tr>
            <tr>
              <th>Product Longdescription:</th>
              <td><textarea name="long_description" class="form-control" id="
                  " cols="30" rows="5">{{ $product->long_description }}</textarea></td>
            </tr>
            <tr>
              <th>Product Image:</th>
              <td class="row">
                <div class="col-md-8">
                  <input type="file" name="product_image[]" class="form-control" multiple>
                </div>
                <div class="col-md-4">
                  <img class="" src="{{ asset($product->product_image) }}" height="70" width="100" alt="">
                </div>
              </td>
            </tr>
            <tr>
              <th>Activation Status:</th>
              <td>
                <input type="radio" name="active" {{ $product->active ?'checked':'' }} value="1"><span
                  class="mx-1">Active</span>
                <input type="radio" name="active" {{ !$product->active ?'checked':'' }} value="0"><span class="mx-1">In
                  Active</span>
              </td>
            </tr>
            <tr>
              <th></th>
              <td><input type="submit" class="btn btn-success btn-sm px-3" name="btn" value="Save"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection