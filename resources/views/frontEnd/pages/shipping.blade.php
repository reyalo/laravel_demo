@extends('frontEnd.master')
@section('title')
Signup
@endsection
@section('content')
<div class="login">
  <div class="main-agileits">
    <div class="form-w3agile form1">
      <h3>Shipping Info</h3>
      {{ Form::open(['route'=>'saveShipping']) }}
      <div class="key">
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" value="{{ $customer->name }}" name="name" required="">
        <div class="clearfix"></div>
      </div>
      <div class="key">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <input type="text" value="{{ $customer->email }}" name="email" required="">
        <div class="clearfix"></div>
      </div>
      <div class="key">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <input type="text" value="Phone" name="phone" onfocus="this.value = '';"
          onblur="if (this.value == '') {this.value = 'Phone';}" required="">
        <div class="clearfix"></div>
      </div>
      <div class="key">
        <i class="fa fa-home" aria-hidden="true"></i>
        <textarea name="address" id="" placeholder="Address" cols="40" rows="5"></textarea>
        <div class="clearfix"></div>
      </div>
      <input type="submit" value="Submit">
      {{ Form::close() }}
    </div>

  </div>
</div>
@endsection