<a href="offer.html"><img src="{{ asset('') }}/frontEnd/images/download.png" class="img-head" alt=""></a>
<div class="header">

  <div class="container">

    <div class="logo">
      <h1><a href="index.html"><b>T<br>H<br>E</b>Brothers Shopping Mall<span>The Best Supermarket</span></a></h1>
    </div>
    <div class="head-t">
      <ul class="card">
        <li><a href="wishlist.html"><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li>
        @if (Session::get('customerId'))
        <li><a href="{{ route('Logout') }}"><i class="fa fa-user" aria-hidden="true"></i>Logout</a></li>
        @else
        <li><a href="{{ route('Login') }}"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
        <li><a href="{{ route('anySignup') }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
        @endif
        <li><a href="about.html"><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
        <li><a href="shipping.html"><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
      </ul>
    </div>

    <div class="header-ri">
      <ul class="social-top">
        <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
        <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
        <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a>
        </li>
        <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
      </ul>
    </div>


    <div class="nav-top">
      <nav class="navbar navbar-default">

        <div class="navbar-header nav_2">
          <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
            data-target="#bs-megadropdown-tabs">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
          <ul class="nav navbar-nav ">
            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}" class="hyper "><span>Home</span></a></li>
            @foreach ($categories as $category)
            <li class="{{ Request::is('category/'.$category->id) ? 'active' : '' }}">

              <a href="{{ route('categoryProduct',['id'=>$category->id]) }}"
                class=" hyper"><span>{{ $category->category_name }}<b class="caret"></b></span></a>
            </li>
            @endforeach
          </ul>
        </div>
      </nav>
      {{-- <script>

      $('#bs-megadropdown-tabs > ul.navbar-nav li').click(function(e) {
      $('.navbar li.active').removeClass('active');
      var $this = $(this);
      if (!$this.hasClass('active')) {
      $this.addClass('active');
      }

      });

      </script> --}}
      <div class="cart">
        <a href="{{ route('cart') }}">
          <span class="fa fa-shopping-cart my-cart-icon"><span
              class="badge badge-notify my-cart-badge">{{ Cart::count() }}</span></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>