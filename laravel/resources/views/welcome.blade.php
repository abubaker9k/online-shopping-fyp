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
          <div class="rectangle rectangle1">
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
        <div id="section2" class="section2">

          <div class="container">
            <h1>Top Products</h1>
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
              <div class="container">
                <h1>Best Selling Products</h1>
                @foreach ($trending_products as $product)
                <div class="items">

                  <div class="img img1"><button class="button" id="Ok"><a href="{{ url('/individual') }}/{{ $product->product_id }}"><img src="{{ asset('storage/'.$product->product_image) }}" alt="{{ $product->product_name }}"></a></div></button>
                  <div class="name">{{ $product->product_name }}</div>
                  <div class="price">{{ $product->category }}</div>
                  <div class="info">Lorem ipsum dolor sit amet consectetur.</div>
                  <br>

                </div>
                @endforeach


    </section>



@endsection

{{-- @foreach ($products as $product)
            <div class="product">
              <h2>{{ $product->product_name }}</h2>
              <p>{{ $product->category }}</p>
              <img src="{{ asset('storage/'.$product->product_image) }}" alt="{{ $product->product_name }}">
            </div>
            @endforeach --}}
