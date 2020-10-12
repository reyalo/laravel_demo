@extends('frontend.master')
@section('content')
<!-- Carousel
        ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <a href="kitchen.html"><img class="first-slide" src="{{ asset('') }}frontend/images/ba.jpg" alt="First slide"></a>

    </div>
    <div class="item">
      <a href="care.html"> <img class="second-slide " src="{{ asset('') }}frontend/images/ba1.jpg"
          alt="Second slide"></a>

    </div>
    <div class="item">
      <a href="hold.html"><img class="third-slide " src="{{ asset('') }}frontend/images/ba2.jpg" alt="Third slide"></a>

    </div>
  </div>

</div><!-- /.carousel -->





<!--content-->
<div class="kic-top ">
  <div class="container ">
    <div class="kic ">
      <h3>Popular Categories</h3>

    </div>
    <div class="col-md-4 kic-top1">
      <a href="single.html">
        <img src="{{ asset('') }}frontend/images/ki.jpg" class="img-responsive" alt="">
      </a>
      <h6>Dal</h6>
      <p>Nam libero tempore</p>
    </div>
    <div class="col-md-4 kic-top1">
      <a href="single.html">
        <img src="{{ asset('') }}frontend/images/ki1.jpg" class="img-responsive" alt="">
      </a>
      <h6>Snacks</h6>
      <p>Nam libero tempore</p>
    </div>
    <div class="col-md-4 kic-top1">
      <a href="single.html">
        <img src="{{ asset('') }}frontend/images/ki2.jpg" class="img-responsive" alt="">
      </a>
      <h6>Spice</h6>
      <p>Nam libero tempore</p>
    </div>
  </div>
</div>

<!--content-->
<div class="product">
  <div class="container">
    <div class="spec ">
      <h3>Products</h3>
      <div class="ser-t">
        <b></b>
        <span><i></i></span>
        <b class="line"></b>
      </div>
    </div>
    <div class=" con-w3l agileinf">
      @foreach ($category_products as $category_product)

      <div class="col-md-3 pro-1">
        <div class="col-m">
          <a href="{{ route('singleProduct',['id'=>$category_product->id]) }}" class="offer-img">
            {{-- <img src="{{ asset($category_product->product_image) }}" class="img-responsive" alt=""> --}}
            @foreach (json_decode($category_product->product_image) as $image)
            <img src="{{ asset($image) }}" alt="" height="200" width="250" class="img-responsive">
            @break;
            @endforeach
          </a>
          <div class="mid-1">
            <div class="women">
              <h6><a href="single.html">{{ $category_product->product_name }}</a></h6>
            </div>
            <div class="mid-2">
              {{-- <p><label>{{ $category_product->product_price }}</label><em
                class="item_price">{{ $category_product->product_price }}</em></p> --}}
              <p class="reduced ">
                <del>Tk.{{ $category_product->product_price+(($category_product->product_price/100)*10) }}</del>Tk.{{ $category_product->product_price }}.00
              </p>
              <div class="block">
                <div class="starbox small ghosting"> </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="add">
              {{ Form::open(['route'=>'addCart']) }}
              <input type="hidden" name="product_id" value="{{ $category_product->id }}">
              <input type="submit" class="btn my-cart-b" name="btn" value="Add to Cart">
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="clearfix"></div>
    </div>
  </div>
</div>



@endsection