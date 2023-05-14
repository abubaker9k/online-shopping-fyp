<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/individual.css') }} ">
    <script type="text/javascript" src="{{asset('js/cartpage.js')}}"></script>
  </head>

<body>
<main class="container">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Left Column / Headphones Image -->

  {{-- <div class="left-column swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img data-image="black" src="{{ asset('img/red.png') }}" alt=""></div>
      <div class="swiper-slide"><img data-image="blue" src="{{ asset('img/blue.png') }}" alt=""></div>
      <<div class="swiper-slide"><img data-image="red" class="active" src="{{ asset('img/black.png') }}" alt=""></div>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div> --}}


  <div class="column-container">
    <div class="left-column">
      <img data-image="red" class="active" src="{{ asset('img/red.png') }}" alt="">
    </div>
    <div class="left-column">
      <img data-image="red" class="active" src="{{ asset('img/red.png') }}" alt="">
    </div>
    <div class="left-column">
      <img data-image="red" class="active" src="{{ asset('img/red.png') }}" alt="">
    </div>
  </div>


  <!-- Right Column -->
  <div class="right-column">

    <!-- Product Description -->
    <div class="product-description">
      <span>Headphones</span>
      <h1>{{ $product->product_name }}</h1>
      <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
    </div>

    <!-- Product Configuration -->
    <div class="product-configuration">

      <!-- Product Color -->
      <div class="product-color">
        <span>Color</span>

        <div class="color-choose">
          <div>
            <input data-image="red" type="radio" id="red" name="color" value="red" checked>
            <label for="red"><span></span></label>
          </div>
          <div>
            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
            <label for="blue"><span></span></label>
          </div>
          <div>
            <input data-image="black" type="radio" id="black" name="color" value="black">
            <label for="black"><span></span></label>
          </div>
        </div>

      </div>

      <!-- Cable Configuration -->
      <div class="cable-config">
        <span>Cable configuration</span>

        <div class="cable-choose">
          <button>Straight</button>
          <button>Coiled</button>
          <button>Long-coiled</button>
        </div>

        <a href="#">How to configurate your headphones</a>
      </div>
    </div>

    <!-- Product Pricing -->
    <div class="product-price">
      <span>148$</span>
      <a href="{{ url('/shipping') }}" class="cart-btn">Add to Shipping</a>
    </div>
  </div>
</main>
</body>
