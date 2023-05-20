@extends('layouts.frontend.main')

@section('main-section')

<h1>All Products</h1>


<div class="maindiv">
    @foreach ($product as $index => $product)
        @if ($index % 4 == 0)
            <div class="row">
        @endif
        <div id="section2" class="section2">
            <div class="container">
                <div class="items">
                    <div class="img img1">
                        <button class="button" id="Ok">
                            <a href="{{ url('/individual') }}/{{ $product->product_id }}">
                                <img src="{{ asset('storage/uploads/images/' . $product->product_image) }}" alt="Product Image">

                            </a>
                        </button>
                    </div>
                    <div class="name">Product Name: {{ $product->product_name }}</div>
                    <div class="price">Product Category: {{ $product->category }}</div>
                    {{-- <div class="info">Lorem ipsum dolor sit amet consectetur.</div> --}}
                </div>
            </div>
        </div>
        @if (($index + 1) % 4 == 0 || $loop->last)
            </div>
        @endif

    @endforeach

</div>

@endsection
