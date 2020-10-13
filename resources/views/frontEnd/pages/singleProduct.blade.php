@extends('frontend.master')
@section('content')


<link href="{{ asset('') }}frontEnd/css/font-awesome.css" rel="stylesheet">

<!-- price range -->
<link rel="stylesheet" type="text/css" href="{{ asset('') }}frontEnd/css/jquery-ui1.css">
<!-- flexslider -->
<link rel="stylesheet" href="{{ asset('') }}frontEnd/css/flexslider.css" type="text/css" media="screen" />

<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
  <div class="container">
    <!-- tittle heading -->
    <h3 class="single-top-main">
      <span class="heading-style">
        <i></i>
        <i></i>
        <i></i>
      </span>
    </h3>
    <!-- //tittle heading -->
    <div class="col-md-5 single-right-left ">
      <div class="grid images_3_of_2">
        <div class="flexslider">
          <ul class="slides">
            @foreach (json_decode($product_info->product_image) as $image)

              <li data-thumb="{{ asset($image) }}">
              <div class="thumb-image">
                <img src="{{ asset($image) }}" height="50" width="100" data-imagezoom="true" class="img-responsi" alt=""> </div>
              </li>
              @endforeach
            {{-- <li data-thumb="{{ asset('') }}frontEnd/images/se2.jpg">
              <div class="thumb-image">
                <img src="{{ asset('') }}frontEnd/images/se2.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
            </li>
            <li data-thumb="{{ asset('') }}frontEnd/images/se3.jpg">
              <div class="thumb-image">
                <img src="{{ asset('') }}frontEnd/images/se3.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
            </li> --}}
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>



    <div class="col-md-7 single-top-left ">
      <div class="single-right">
        <h3>{{ $product_info->product_name }}</h3>


        <div class="pr-single">
          <p class="reduced "><del>Tk.{{ $product_info->product_price+(($product_info->product_price/100)*10) }}.00</del>Tk.{{ $product_info->product_price }}.00</p>
        </div>
        <div class="block block-w3">
          <div class="starbox small ghosting"> </div>
        </div>
        <p class="in-pa"> {{ $product_info->short_description }} </p>

        <ul class="social-top">
          <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a>
          </li>
          <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
          <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a>
          </li>
          <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a>
          </li>
        </ul>
        {{-- <div class="add add-3">
          <button class="btn btn-danger my-cart-btn my-cart-b">Add to Cart</button>
        </div> --}}
        <div class="add add-3">
          {{ Form::open(['route'=>'addCart']) }}
          <input type="hidden" name="product_id" value="{{ $product_info->id }}">
          <input type="submit" class="btn my-cart-b" name="btn" value="Add to Cart">
          {{ Form::close() }}
        </div>



        <div class="clearfix"> </div>
      </div>


    </div>
    <div class="clearfix"> </div>



    <div class="clearfix"> </div>
  </div>
</div>
<!-- //Single Page -->


<!-- imagezoom -->
<script src="{{ asset('') }}frontEnd/js/imagezoom.js"></script>
<!-- //imagezoom -->

<!-- FlexSlider -->
<script src="{{ asset('') }}frontEnd/js/jquery.flexslider.js"></script>
<script>
  // Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
</script>
<!-- //FlexSlider-->

<!-- flexisel (for special offers) -->
<script src="{{ asset('') }}frontEnd/js/jquery.flexisel.js"></script>
<script>
  $(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
</script>
<!-- //flexisel (for special offers) -->

<!-- for bootstrap working -->
<script src="{{ asset('') }}frontEnd/js/bootstrap.js"></script>



{{-- <!--banner-->
<div class="banner-top">
  <div class="container">
    <h3>Lorem</h3>
    <h4><a href="index.html">Home</a><label>/</label>Lorem</h4>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="single">
  <div class="container">
    <div class="single-top-main">
      <div class="col-md-5 single-top">
        <div class="single-w3agile">

          <div id="picture-frame">
            <img src="{{ asset('') }}frontEnd/images/si.jpg" data-src="{{ asset('') }}frontEnd/images/si-1.jpg" alt="" class="img-responsive" />
          </div>
          <script src="{{ asset('') }}frontEnd/js/jquery.zoomtoo.js"></script>
          <script>
            $(function() {
				$("#picture-frame").zoomToo({
					magnify: 1
				});
			});
          </script>



        </div>
      </div>
      <div class="col-md-7 single-top-left ">
        <div class="single-right">
          <h3>Wheat</h3>


          <div class="pr-single">
            <p class="reduced "><del>$10.00</del>$5.00</p>
          </div>
          <div class="block block-w3">
            <div class="starbox small ghosting"> </div>
          </div>
          <p class="in-pa"> There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
            believable. </p>

          <ul class="social-top">
            <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a>
            </li>
            <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
            <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a>
            </li>
            <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a>
            </li>
          </ul>
          <div class="add add-3">
            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1"
              data-price="6.00" data-quantity="1" data-image="images/si.jpg">Add to Cart</button>
          </div>



          <div class="clearfix"> </div>
        </div>


      </div>
      <div class="clearfix"> </div>
    </div>


  </div>
</div>
<!----> --}}

@endsection