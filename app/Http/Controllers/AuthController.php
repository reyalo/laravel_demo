<?php

namespace App\Http\Controllers;

use Session;
use Cart;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function signup()
  {
    return view('frontEnd.pages.signup');
  }
  public function anySignup()
  {
    return view('frontEnd.pages.anySignup');
  }
  public function login()
  {
    return view('frontEnd.pages.login');
  }
  public function anyLogin()
  {
    return view('frontEnd.pages.anyLogin');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function checkLogin(Request $request)
  {
    $customer = Customer::where('email', $request->email)->first();
    if (!$customer) {
      return redirect('user/login')->with('message', 'Please Input Valid Email');
    }
    if (password_verify($request->password, $customer->password)) {
      Session::put('customerId', $customer->id);
      Session::put('customerName', $customer->name);
      return redirect('cart/shipping');
    } else {
      return redirect('user/login')->with('message', 'Please Input Valid Password');
    }

    // return $customer;
  }
  public function checkAnyLogin(Request $request)
  {
    $customer = Customer::where('email', $request->email)->first();
    if (!$customer) {
      return redirect('login')->with('message', 'Please Input Valid Email');
    }
    if (password_verify($request->password, $customer->password)) {
      Session::put('customerId', $customer->id);
      Session::put('customerName', $customer->name);
      return redirect('/');
    } else {
      return redirect('login')->with('message', 'Please Input Valid Password');
    }

    // return $customer;
  }
  public function saveCustomerSignup(Request $request)
  {
    // return $request->all();
    $request->validate([
      'email' => 'required|unique:customers,email'
    ]);
    $customer = new Customer();
    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->password = bcrypt($request->password);
    $customer->save();
    // return $customer;

    Session::put('customerId', $customer->id);
    Session::put('customerName', $customer->name);
    return redirect('cart/shipping');
  }
  public function saveAnySignup(Request $request)
  {
    // return $request->all();
    $request->validate([
      'email' => 'required|unique:customers,email'
    ]);
    $customer = new Customer();
    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->password = bcrypt($request->password);
    $customer->save();
    // return $customer;

    Session::put('customerId', $customer->id);
    Session::put('customerName', $customer->name);
    return redirect('/');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function shipping()
  {
    $customer = Customer::find(Session::get('customerId'));

    return view('frontEnd.pages.shipping',['customer'=>$customer]);
  }
  public function saveShipping(Request $request)
  {
    $request->validate([
      'email' => 'required|unique:shippings,email'
    ]);
    $shipping = new Shipping();
    $shipping->name = $request->name;
    $shipping->email = $request->email;
    $shipping->phone = $request->phone;
    $shipping->address = $request->address;
    $shipping->save();
    Session::put('shippingId',$shipping->id);
    return redirect('cart/payment');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function payment()
  {
    return view('frontEnd.pages.payment');
  }
  public function savePayment(Request $request)
  {
    // $payment = new Payment();
    // $payment->payment_method = $request->payment_method;

    // $payment->save();
    $payment_method = $request->payment_method;
    // return $payment_method;
    if ($payment_method=='COD') {
      $order = new Order();
      $order->customer_id = Session::get('customerId');
      $order->shipping_id = Session::get('shippingId');
      $order->total = Session::get('total');
      $order->save();

      $payment = new Payment();
      $payment->order_id = $order->id;
      $payment->payment_method = $payment_method;
      $payment->save();

      $cart_products = Cart::content();
      // return $cart_products;
      foreach ($cart_products as $cart_product) {
        $order_detail = new OrderDetail();
        $order_detail->order_id = $order->id;
        $order_detail->product_id = $cart_product->id;
        $order_detail->product_name = $cart_product->name;
        $order_detail->product_price = $cart_product->price;
        $order_detail->product_quantity = $cart_product->qty;
        $order_detail->save();


      }
      Cart::destroy();

      return redirect('/');





    } elseif ($payment_method == 'bkash') {

    }elseif ($payment_method == 'rocket') {

    }
return "Yes";

    // return redirect('/');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function anyLogout()
  {
    Session::forget('customerId');
    Session::forget('shippingId');
    return redirect('/');
  }
}
