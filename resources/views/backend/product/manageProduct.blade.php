@extends('backEnd.master')
@section('title')
Admin-Manage Product
@endsection
@section('content')
<h5 class="text-right text-success">{{ Session::get('message') }}</h5>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manage Product</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-primary text-light">
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Brand Name</th>
            <th>Category Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Product Description</th>
            <th>Product Image</th>
            <th>Activation Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Brand Name</th>
            <th>Category Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Product Description</th>
            <th>Product Image</th>
            <th>Activation Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->product_name}}</td>
            <td>{{ $product->brand_name}}</td>
            <td>{{ $product->category_name}}</td>
            <td>{{ $product->product_price}}</td>
            <td>{{ $product->product_quantity}}</td>
            <td>{{ $product->short_description}}</td>
            <td>
            @foreach (json_decode($product->product_image) as $image)
            <img src="{{ asset($image) }}" height="40" width="50" alt="IMage Here">
            @break;
            @endforeach
            </td>
            <td>{{ $product->active ? 'Active':'Inactive' }}</td>
            <td>
              @if ($product->active)
              <a href="{{ route('activeProduct',['id'=>$product->id]) }}" class="btn btn-sm btn-success" title="Active">
                <span class="fa fa-arrow-up"></span>
              </a>
              @else
              <a href="{{ route('activeProduct',['id'=>$product->id]) }}" class="btn btn-sm btn-warning" title="Inactive">
                <span class="fa fa-arrow-down"></span>
              </a>
              @endif
              <a href="{{ route('editProduct',['id'=>$product->id]) }}" class="btn btn-sm btn-info" title="Edit">
                <span class="fa fa-edit"></span>
              </a>
              <a href="{{ route('deleteProduct',['id'=>$product->id]) }}" class="btn btn-sm btn-danger" title="Delete">
                <span class="fa fa-trash"></span>
              </a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection