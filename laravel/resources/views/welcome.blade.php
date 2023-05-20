@extends('layouts.frontend.main')

@section('main-section')
    <section>
      <div class="section">


        <section class="hero">
            <div class="hero-text">
              <h1>3D Ecommerce Store</h1>
              <p>Your satisfaction is our priority</p>
            </div>
          </section>
          <div class="outer-container-after_banner_image">
          <div class="container-home">
          <div class="rectangle rectangle1 view3D" >
                <h1>3D view</h1>
        </div>
          <div class="rectangle rectangle1">
            <h1>Automated Video Editor</h1>
          </div>
          <div class="rectangle rectangle1">
            <h1>Voice Search </h1>
          </div>
          <div class="rectangle rectangle1">
            <h1>Visual Search</h1>
          </div>
        </div>
    </div>
    <i class="fa-solid fa-cart-shopping"></i>
        <div id="section2" class="section2">
            <h1 class = 'top-product'>Top Products</h1>
          <div class="container">

            @foreach ($products as $product)
            <div class="items">

              <div class="img img1"><button class="button" id="Ok"><a href="{{ url('/individual') }}/{{ $product->product_id }}"><img src="{{ asset('storage/'.$product->product_image) }}" alt="{{ $product->product_name }}"></a></div></button>
              <div class="name">{{ $product->product_name }}</div>
              <div class="price">{{ $product->category }}</div>
              <div class="info">Lorem ipsum dolor sit amet consectetur.</div>
              <br>

            </div>
            @endforeach

            <div id="section2" class="section2">
                <h1>Best Selling Products</h1>
              <div class="container">

                @foreach ($trending_products as $product)
                <div class="items">

                  <div class="img img1"><button class="button" id="Ok"><a href="{{ url('/individual') }}/{{ $product->product_id }}">
                    <img src="{{ asset('storage/uploads/images/' . $product->product_image) }}" alt="Product Image"></a></div></button>
                  <div class="name">{{ $product->product_name }}</div>
                  <div class="price">{{ $product->category }}</div>
                  <div class="info">Lorem ipsum dolor sit amet consectetur.</div>
                  <br>

                </div>
                @endforeach


    </section>



@endsection
