@extends('backEnd.master')
@section('title')
Add Brand
@endsection
@section('content')
<h5 class="text-right text-success">{{ Session::get('message') }}</h5>
<div class="container">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center text-primary">Add Brand</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('storeBrand') }}" method="POST">
          @csrf
          <table class="table">
            <tr>
              <th>Brand Name:</th>
              <td><input type="text" name="brand_name" class="form-control"></td>
            </tr>
            <tr>
              <th>Brand Description:</th>
              <td><textarea name="brand_description" class="form-control" id="
                  " cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
              <th>Activation Status:</th>
              <td>
                <input type="radio" name="active" checked value="1"><span class="mx-1">Active</span>
                <input type="radio" name="active" value="0"><span class="mx-1">In Active</span>
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