<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Order;
use App\Customer;
use App\OrderDetail;
use App\Shipping;
use App\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $orders = DB::table('orders')
      ->join('customers', 'orders.customer_id', 'customers.id')
      ->join('payments', 'orders.id', 'payments.order_id')
      ->select('orders.*', 'customers.name', 'payments.payment_method', 'payments.payment_status')
      ->get();


    return view('backend.order.manageOrder', ['orders' => $orders]);
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
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function viewOrder($id)
  {
    $order = Order::find($id);
    $customer = Customer::find($order->customer_id);
    $shipping = Shipping::find($order->shipping_id);
    $payment = Payment::where('order_id', $id)->first();
    $orderDetails = OrderDetail::where('order_id', $id)->get();
    // return $order;
    // return $customer;
    // return $shipping;
    // return $payment;
    // return $orderDetails;
    return view('backend.order.viewDetail', ['order' => $order, 'customer' => $customer, 'payment' => $payment, 'shipping' => $shipping, 'orderDetails' => $orderDetails]);
  }
  public function invoiceOrder($id)
  {
    $order = Order::find($id);
    $customer = Customer::find($order->customer_id);
    $shipping = Shipping::find($order->shipping_id);
    $payment = Payment::where('order_id', $id)->first();
    $orderDetails = OrderDetail::where('order_id', $id)->get();
    // return $order;
    // return $customer;
    // return $shipping;
    // return $payment;
    // return $orderDetails;
    return view('backend.invoice.invoiceOrder', ['order' => $order, 'customer' => $customer, 'payment' => $payment, 'shipping' => $shipping, 'orderDetails' => $orderDetails]);

  }
  public function invoicePrint($id)
  {
    $order = Order::find($id);
    $customer = Customer::find($order->customer_id);
    $shipping = Shipping::find($order->shipping_id);
    $payment = Payment::where('order_id', $id)->first();
    $orderDetails = OrderDetail::where('order_id', $id)->get();


    $pdf = PDF::loadView('backend.invoice.invoicePrint', ['order' => $order, 'customer' => $customer, 'payment' => $payment, 'shipping' => $shipping, 'orderDetails' => $orderDetails]);
    return $pdf->stream('invoice.pdf');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order)
  {
    //
  }
}
