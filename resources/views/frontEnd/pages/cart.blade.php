@extends('frontend.master')
@section('title')
Cart
@endsection
@section('content')
<div class="container">
  <div class="panel">
    <div class="panel-head text-center">
      <h2>Shopping Cart</h2>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Sl No</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Total Price</th>
            <th>Update Item</th>
            <th>Active</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i=1;
          $total = 0;
          @endphp
          @foreach ($cart_products as $cart_product)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $cart_product->name }}</td>
            <td><img src="{{ asset($cart_product->options->image) }}" height="50" width="70" alt="Image"></td>
            <td>{{ $cart_product->price }}</td>
            <td>{{ $cart_product->qty }}</td>
            <td>{{ $total+=$cart_product->subtotal }}</td>
            <td>Demo</td>
            <td>Demo</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <table class="table table-bordered">
        <tr>
          <th>Total :</th>
          <td>
            {{ Cart::total() }}
            {{ Session::put('total',$total) }}
          </td>
        </tr>
        <tr>
          <th>Delivery Charge :</th>
          <td>00.00</td>
        </tr>
      </table>
      <input type="btn" class="btn btn-success pull-left" value="Continue Shopping">
      @if (Session::get('customerId') && Session::get('shippingId'))
      <a href="{{ route('payment') }}"><input type="btn" class="btn btn-info pull-right" value="Checkout"></a>
      @elseif(Session::get('customerId'))
      <a href="{{ route('shipping') }}"><input type="btn" class="btn btn-info pull-right" value="Checkout"></a>
      @else
      <a href="{{ route('customerLogin') }}"><input type="btn" class="btn btn-info pull-right" value="Checkout"></a>
      @endif
    </div>
  </div>
</div>
@endsection