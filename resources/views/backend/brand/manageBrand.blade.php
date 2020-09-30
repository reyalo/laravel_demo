@extends('backEnd.master')
@section('title')
Admin-Manage brand
@endsection
@section('content')
<h5 class="text-right text-success">{{ Session::get('message') }}</h5>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manage Brand</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-primary text-light">
          <tr>
            <th>Brand ID</th>
            <th>Brand Name</th>
            <th>Brand Description</th>
            <th>Activation Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Brand ID</th>
            <th>Brand Name</th>
            <th>Brand Description</th>
            <th>Activation Status</th>
            <th>Action</th>
          </tr>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($brands as $brand)
          <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->brand_name }}</td>
            <td>{{ $brand->brand_description }}</td>
            <td>{{ $brand->active ? 'Active':'Inactive' }}</td>
            <td>
              @if ($brand->active)
              <a href="{{ route('activeBrand',['id'=>$brand->id]) }}" class="btn btn-sm btn-success" title="Active">
                <span class="fa fa-arrow-up"></span>
              </a>
              @else
              <a href="{{ route('activeBrand',['id'=>$brand->id]) }}" class="btn btn-sm btn-warning" title="Inactive">
                <span class="fa fa-arrow-down"></span>
              </a>
              @endif
              <a href="{{ route('editBrand',['id'=>$brand->id]) }}" class="btn btn-sm btn-info" title="Edit">
                <span class="fa fa-edit"></span>
              </a>
              <a href="{{ route('deleteBrand',['id'=>$brand->id]) }}" class="btn btn-sm btn-danger" title="Delete">
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