@extends('backend.master')
@section('content')
<style>
  body {
    background-color: #eee
  }

  hr {
    /* margin-top: 2px; */
    /* margin-bottom: 2px; */
  }

  .fs-12 {
    font-size: 12px;
    margin-top: 10px;
  }

  .fs-15 {
    font-size: 15px
  }

  .name {
    margin-bottom: -2px
  }

  .product-details {
    margin-top: 13px
  }
</style>
<h4 class="text-right text-success">{{ Session::get('message') }}</h4>





{{-- New Invoice template --}}
<div class="container mt-5 mb-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-8">
      <div class="receipt bg-white p-3 rounded"><img src="https://i.imgur.com/zCAnG06.png" width="120">
        <h4 class="mt-2 mb-3">Your order is confirmed!</h4>
        <h6 class="name">Hello {{ $customer->name }},</h6><span class="fs-12 text-black-50">your order has been
          confirmed and will be
          shipped in two days</span>
        <hr>
        <div class="d-flex flex-row justify-content-between align-items-center order-details">
          <div><span class="d-block fs-12">Order date</span><span
              class="font-weight-bold">{{ $order->created_at }}</span></div>
          <div><span class="d-block fs-12">Order number</span><span
              class="font-weight-bold">OD0000{{ $order->id }}</span></div>
          <div><span class="d-block fs-12">Payment method</span><span
              class="font-weight-bold">{{ $payment->payment_type }}</span><img class="ml-1 mb-1"
              src="https://i.imgur.com/ZZr3Yqj.png" width="20"></div>
          <div><span class="d-block fs-12">Shipping Address</span><span
              class="font-weight-bold text-success">{{$shipping->address}}</span></div>
        </div>
        <hr>
        @foreach ($orderDetails as $orderDetail)

        <div class="d-flex justify-content-between align-items-center product-details">
          <div class="d-flex flex-row product-name-image"><img class="rounded" src="https://i.imgur.com/b7Ve3fJ.jpg"
              width="50" height="50">
            <div class="d-flex flex-row justify-content-between ml-2">
              <div style="padding-right: 150px;">
                <span class="d-block font-weight-bold p-name">{{ $orderDetail->product_name }}</span>
                <span class="fs-12">Accessories</span>
              </div>
              <span class="fs-12">Qty: {{ $orderDetail->product_quantity-1 }}pcs</span>
            </div>
          </div>
          <div class="product-price">
            <h6>Tk.{{ $orderDetail->product_price*$orderDetail->product_quantity }}.00</h6>
          </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-between align-items-center product-details">
          <div class="d-flex flex-row product-name-image"><img class="rounded" src="https://i.imgur.com/b7Ve3fJ.jpg"
              width="50" height="50">
            <div class="d-flex flex-row justify-content-between ml-2">
              <div style="padding-right: 150px;">
                <span class="d-block font-weight-bold p-name">Ralco formal Belt for men</span>
                <span class="fs-12">Accessories</span>
              </div>
              <span class="fs-12">Qty: 1pcs</span>
            </div>
          </div>
          <div class="product-price">
            <h6>Tk.50.00</h6>
          </div>
        </div>
        <div class="mt-5 amount row">
          <div class="d-flex justify-content-center col-md-6"><img src="https://i.imgur.com/AXdWCWr.gif" width="250"
              height="100"></div>
          <div class="col-md-6">
            <div class="billing">
              <div class="d-flex justify-content-between"><span>Subtotal</span><span
                  class="font-weight-bold">Tk.{{ $order->total }}</span></div>
              <div class="d-flex justify-content-between mt-2"><span>Shipping fee</span><span
                  class="font-weight-bold">Tk.15.00</span></div>
              <div class="d-flex justify-content-between mt-2"><span>Tax</span><span
                  class="font-weight-bold">Tk.0.00</span>
              </div>
              <div class="d-flex justify-content-between mt-2"><span class="text-success">Discount</span><span
                  class="font-weight-bold text-success">Tk.25.00</span></div>
              <hr>
              <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span
                  class="font-weight-bold text-success">Tk.{{ $order->total }}</span></div>
              {{-- class="font-weight-bold text-success">Tk.{{ (double)(str_replace(',','',$order->total))+15-25 }}.00</span>
            </div> --}}
          </div>
        </div>
      </div><span class="d-block">Expected delivery date</span><span class="font-weight-bold text-success">12 March
        2020</span><span class="d-block mt-3 text-black-50 fs-15">We will be sending a shipping confirmation email
        when the item is shipped!</span>
      <hr>
      <div class="d-flex justify-content-between align-items-center footer">
        <div class="thanks"><span class="d-block font-weight-bold">Thanks for shopping</span><span>Amazon team</span>
        </div>
        <div class="d-flex flex-column justify-content-end align-items-end"><span class="d-block font-weight-bold">Need
            Help?</span><span>Call - 974493933</span></div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection