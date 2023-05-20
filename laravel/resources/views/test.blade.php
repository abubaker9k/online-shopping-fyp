{{-- @php
    dump($product);
@endphp --}}

<div id="modelContainer" data-model-filename="{{ $product->product_model }}" style="width: 100%; height: 500px;"></div>
<script type="module" src="/js/main.js"></script>

{{-- <div id="modelContainer" data-model-filename="{{ $product->product_model }}" style="width: 100%; height: 500px;"></div> --}}





    {{-- working default code --}}
    {{-- <div id="modelContainer" data-model-path="D:/codes/online-shopping-fyp/laravel/storage/app/public/{{ $product->product_model }}" style="width: 100%; height: 500px;"></div>
<script type="module" src="/js/main.js"></script> --}}


