@extends('frontEnd.master')
@section('title')
Login
@endsection
@section('content')
<!--login-->
<h2 class="pull-right text-success">{{ Session::get('message') }}</h2>
<div class="login">

  <div class="main-agileits">
    <div class="form-w3agile">
      <h3>Login</h3>
      {{ Form::open(['route'=>'checkAnyLogin']) }}
      <div class="key">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <input type="text" value="Email" name="email" onfocus="this.value = '';"
          onblur="if (this.value == '') {this.value = 'Email';}" required="">
        <div class="clearfix"></div>
      </div>
      <div class="key">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" value="Password" name="password" onfocus="this.value = '';"
          onblur="if (this.value == '') {this.value = 'Password';}" required="">
        <div class="clearfix"></div>
      </div>
      <input type="submit" value="Login">
      {{ Form::close() }}
    </div>
    <div class="forg">
      <a href="#" class="forg-left">Forgot Password</a>
      <a href="{{ route('customerSignup') }}" class="forg-right">Register</a>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection