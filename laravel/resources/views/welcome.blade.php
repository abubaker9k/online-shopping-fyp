@extends('layouts.frontend.main')

@section('main-section')
    <section>
      <div class="section">
        <div class="section1">
          <div class="img-slider">
            <img src="https://images.pexels.com/photos/6347888/pexels-photo-6347888.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img">
            <img src="https://images.pexels.com/photos/3962294/pexels-photo-3962294.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img">
            <img src="https://images.pexels.com/photos/2292953/pexels-photo-2292953.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="" class="img">
            <img src="https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img">
            <img src="https://images.pexels.com/photos/1598505/pexels-photo-1598505.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="img">
          </div>

        </div>

        <div id="section2" class="section2">
          <div class="container">
            <h1>Top Products</h1>
            <div class="items">
              <div class="img img1"><button class="button" id="Ok"><a href= "{{ url('/individual') }}"><img src="https://images.pexels.com/photos/1464625/pexels-photo-1464625.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a></div></button>
              <div class="name">SHOES</div>
              <div class="price">$5</div>
              <div class="info">Lorem ipsum dolor sit amet consectetur.</div>
            </div>
            <div class="items">
              <div class="img img2"><button class="button" id="Ok"><a href= "C:\Users\Administrator\Desktop\basit\FYP\product-page\Pindex.html"><img src="https://images.pexels.com/photos/3649765/pexels-photo-3649765.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""></a></div></button>
              <div class="name">MEN's T-SHIRT</div>
              <div class="price">$6.34</div>
              <div class="info">Lorem ipsum dolor sit.</div>
            </div>
            <div class="items">
              <div class="img img3"><button class="button" id="Ok"><a href= "C:\Users\Administrator\Desktop\basit\FYP\product-page\Pindex.html"><img src="https://media.istockphoto.com/photos/folded-blue-jeans-on-a-white-background-modern-casual-clothing-flat-picture-id1281304280" alt=""></a></div></button>
              <div class="name">JEANS</div>
              <div class="price">$9</div>
              <div class="info">Lorem ipsum dolor sit amet.</div>
            </div>
            <br>

            <div id="section2" class="section2">
              <div class="container">
                <h1>Best Selling Products</h1>
                <div class="items">
                  <div class="img img1"><button class="button" id="Ok"><a href= "{{ url('/individual') }}"><img src="https://images.pexels.com/photos/1464625/pexels-photo-1464625.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a></div></button>
                  <div class="name">SHOES</div>
                  <div class="price">$5</div>
                  <div class="info">Lorem ipsum dolor sit amet consectetur.</div>
                </div>
                <div class="items">
                  <div class="img img2"><button class="button" id="Ok"><a href= "C:\Users\Administrator\Desktop\basit\FYP\product-page\Pindex.html"><img src="https://images.pexels.com/photos/3649765/pexels-photo-3649765.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""></a></div></button>
                  <div class="name">MEN's T-SHIRT</div>
                  <div class="price">$6.34</div>
                  <div class="info">Lorem ipsum dolor sit.</div>
                </div>
                <div class="items">
                  <div class="img img3"><button class="button" id="Ok"><a href= "C:\Users\Administrator\Desktop\basit\FYP\product-page\Pindex.html"><img src="https://media.istockphoto.com/photos/folded-blue-jeans-on-a-white-background-modern-casual-clothing-flat-picture-id1281304280" alt=""></a></div></button>
                  <div class="name">JEANS</div>
                  <div class="price">$9</div>
                  <div class="info">Lorem ipsum dolor sit amet.</div>
                </div>


    </section>

    {{-- @foreach ($product  as $product)
<div id="section2" class="section2">
<div class="container">

    <div class="items">
      <div class="img img1"><button class="button" id="Ok"><a href= "{{ url('/individual') }}/{{ $product->product_id }}"><img src="https://images.pexels.com/photos/1464625/pexels-photo-1464625.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""></a></div></button>
      <div class="name">Product Name: {{ $product->product_name }}</div>
      <div class="price">Product Category: {{ $product->category }}</div>
      {{-- <div class="info">Lorem ipsum dolor sit amet consectetur.</div> --}}
    {{-- </div>
</div>
</div>
@endforeach --}}
@endsection
