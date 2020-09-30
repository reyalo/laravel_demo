@extends('frontend.master')
@section('title')
Payment
@endsection
@section('content')
<div class="container">
  <div class="row col-md-6">
    <div class="panel">
      {{ Form::open(['route'=>'savePayment']) }}

      <table class="table">
        <tr>
          <th>Payment Type</th>
          <th></th>
        </tr>
        <tr>
          <td>Cash On Delivery:</td>
          <td><input type="radio" value="COD" name="payment_method"></td>
        </tr>
        <tr>
          <td>Bkash</td>
          <td><input type="radio" value="bkash" name="payment_method"></td>

        </tr>
        <tr>
          <td>Rocket</td>
          <td><input type="radio" value="Rocket" name="payment_method"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" class="btn btn-info pull-right" value="Confrim"></td>
        </tr>
      </table>

      
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection