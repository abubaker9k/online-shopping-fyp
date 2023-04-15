@extends('layouts.frontend.main')

@section('main-section')

<h1>All Products</h1>

@foreach ($product as $product)
<div class="maindiv">
    <div id="section2" class="section2">
        <div class="container">
          <div class="items">
            <div class="img img1">
              <button class="button" id="Ok">
                <a href="{{ url('/individual') }}/{{ $product->product_id }}">
                    <img src="{{ asset('storage/'.$product->product_image) }}" alt="Product Image">
                </a>
              </button>
            </div>
            <div class="name">Product Name: {{ $product->product_name }}</div>
            <div class="price">Product Category: {{ $product->category }}</div>
            {{-- <div class="info">Lorem ipsum dolor sit amet consectetur.</div> --}}
          </div>
        </div>
      </div>
  <div id="section2" class="section2">
    <div class="container">
      <div class="items">
        <div class="img img1">
          <button class="button" id="Ok">
            <a href="{{ url('/individual') }}/{{ $product->product_id }}">
                <img src="{{ asset('storage/'.$product->product_image) }}" alt="Product Image">
            </a>
          </button>
        </div>
        <div class="name">Product Name: {{ $product->product_name }}</div>
        <div class="price">Product Category: {{ $product->category }}</div>
        {{-- <div class="info">Lorem ipsum dolor sit amet consectetur.</div> --}}
      </div>
    </div>
  </div>
  <div id="section2" class="section2">
    <div class="container">
      <div class="items">
        <div class="img img1">
          <button class="button" id="Ok">
            <a href="{{ url('/individual') }}/{{ $product->product_id }}">
                <img src="{{ asset('storage/'.$product->product_image) }}" alt="Product Image">
            </a>
          </button>
        </div>
        <div class="name">Product Name: {{ $product->product_name }}</div>
        <div class="price">Product Category: {{ $product->category }}</div>
        {{-- <div class="info">Lorem ipsum dolor sit amet consectetur.</div> --}}
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
