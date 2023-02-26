@extends('layouts.frontend.main')

@section('main-section')

<h1>All Products</h1>

@foreach ($product  as $product)
<div id="section2" class="section2">
<div class="container">

    <div class="items">
      <div class="img img1"><button class="button" id="Ok"><a href= "{{ url('/individual') }}/{{ $product->product_id }}"><img src="https://images.pexels.com/photos/1464625/pexels-photo-1464625.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a></div></button>
      <div class="name">{{ $product->product_name }}</div>
      <div class="price">{{ $product->category }}</div>
      <div class="info">Lorem ipsum dolor sit amet consectetur.</div>
    </div>
</div>
</div>
@endforeach
@endsection
