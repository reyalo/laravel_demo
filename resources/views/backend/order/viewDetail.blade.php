@extends('backend.master')
@section('content')
<h4 class="text-right text-success">{{ Session::get('message') }}</h4>
<div class="row ">
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-header">
        <h4 class="text-center text-success">Customer Info</h4>
      </div>
      <div class="card-body">
        <div class="container">
          <table class="table table-bordered">
            <tr>
              <th>Customer Name:</th>
              <td>{{ $customer->name }}</td>
            </tr>
            <tr>
              <th>Email :</th>
              <td>{{ $customer->email }}</td>
            </tr>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-header">
        <h4 class="text-center text-success">Shipping Info</h4>
      </div>
      <div class="card-body">
        <div class="container">
          <table class="table table-bordered">
            <tr>
              <th>Receiver Name:</th>
              <td>{{ $shipping->name }}</td>
            </tr>
            <tr>
              <th>Email :</th>
              <td>{{ $shipping->email }}</td>
            </tr>
            <tr>
              <th>Phone :</th>
              <td>{{ $shipping->phone }}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{ $shipping->address }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-header">
        <h4 class="text-center text-success">Payment Info</h4>
      </div>
      <div class="card-body">
        <div class="container">
          <table class="table table-bordered">
            <tr>
              <th>Payment Type:</th>
              <td>{{ $payment->payment_method }}</td>
            </tr>
            <tr>
              <th>Payment status :</th>
              <td>{{ $payment->payment_status }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-header">
        <h4 class="text-center text-success">Product Info</h4>
      </div>
      <div class="card-body">
        <div class="container">
          <table class="table table-bordered">
            <tr class="bg-primary text-light">
              <th>SL No</th>
              <th>Product Id</th>
              <th>Product Name</th>
              <th>Product Price </th>
              <th>Product Quantity </th>
              <th>Total Price </th>
            </tr>
            @php
            $i=1
            @endphp
            @foreach ($orderDetails as $orderDetail)
            <tr>
              <td> {{ $i++ }} </td>
              <td> {{ $orderDetail->product_id }} </td>
              <td> {{ $orderDetail->product_name }} </td>
              <td> {{ $orderDetail->product_price }}.00 </td>
              <td> {{ $orderDetail->product_quantity }} </td>
              <td> {{ $orderDetail->product_price*$orderDetail->product_quantity }}.00 </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection