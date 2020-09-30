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
            <th>SL No.</th>
            <th>Customer Name</th>
            <th>Order Total</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Payment Type</th>
            <th>Payment status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i=1
          @endphp
          @foreach ($orders as $order)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->order_status }}</td>
            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->payment_status }}</td>
            <td>
              <a href="{{ route('viewOrder',$order->id) }}" class="btn btn-primary btn-sm " title="View order details">
                <span class="fa fa-edit"></span>
              </a>
              <a href="{{ route('invoiceOrder',$order->id) }}" class="btn btn-info btn-sm " title="View order Invoice">
                <span class="fa fa-edit"></span>
              </a>
              <a href="{{ route('invoiceDownload',$order->id) }}" class="btn btn-primary btn-sm " title="Download order Invoice">
                <span class="fa fa-edit"></span>
              </a>
              <a href="{{ route('deleteOrder',$order->id) }}" class="btn btn-info btn-sm " title="edit order">
                <span class="fa fa-edit"></span>
              </a>
              <a href="{{ route('deleteOrder',$order->id) }}" class="btn btn-danger btn-sm " title="Delete Order">
                <span class="fa fa-trash"></span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>SL No.</th>
            <th>Customer Name</th>
            <th>Order Total</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Payment Type</th>
            <th>Payment status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>


        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection