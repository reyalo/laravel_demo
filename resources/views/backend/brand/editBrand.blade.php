@extends('backEnd.master')
@section('title')
Edit Brand
@endsection
@section('content')
<h5 class="text-right text-success">{{ Session::get('message') }}</h5>
<div class="container">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center text-primary">Edit Brand</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('updateBrand') }}" method="POST">
          @csrf
          <table class="table">
            <tr>
              <th>Brand Name:</th>
              <td><input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control"></td>
              <td><input type="hidden" name="brand_id" value="{{ $brand->id }}" class="form-control"></td>
            </tr>
            <tr>
              <th>Brand Description:</th>
              <td><textarea name="brand_description" class="form-control" id="
                  " cols="30" rows="5">{{ $brand->brand_description }}</textarea></td>
            </tr>
            <tr>
              <th>Activation Status:</th>
              <td>
                <input type="radio" name="active" {{ $brand->active ? 'checked':'' }} value="1"><span
                  class="mx-1">Active</span>
                <input type="radio" name="active" {{ !$brand->active ? 'checked':'' }} value="0"><span class="mx-1">In
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