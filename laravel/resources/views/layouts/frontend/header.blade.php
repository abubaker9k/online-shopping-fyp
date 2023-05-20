<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visualseach.css') }}">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }} ">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
      /* Add these rules to remove the space around the search form and icon */
      .search {
        margin: 0;
        padding: 0;
      }
      .example {
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <header>
      <div class="logo"><a href="{{url('/')}}">Modern Ecommerce </a></div>
      <div class="menu">
        <a href="#">
          <ion-icon name="close" class="close"></ion-icon>
        </a>

      </div>
      <div class="search">
       <?php $search = session()->get('search'); ?>
       <form id="searchForm" class="example" action="{{ url('/shop') }}" style="margin:auto;max-width:300px">
        <input type="text" placeholder="Search.." name="search" value="{{ request('search') }}" id="searchInput">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
{{-- working code
        <form class="example" action="{{ url('/shop') }}" style="margin:auto;max-width:300px">
          <input type="text" placeholder="Search.." name="search" value="">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form> --}}
        <button class="button" id="Ok"><a href= "{{url('/image-search')}}"><img src="{{ asset('img/header/google lens.webp') }}" alt="car" width="30" height="25"></a></button>
        <button class="button" id="Ok"><a href= "{{url('/voice-search')}}"><img src="{{ asset('img/header/google mic.png') }}" alt="car" width="30" height="25"></a></button>

      </div>
      <div class="heading">
        <ul>
            <div>
          <li><a href= "{{url('/')}}" class="">HOME</a></li></div>
          <li><a href="{{url('/shop')}}" class="under">SHOP</a></li>

          @if (auth()->check())
        <li><a href="{{ url('/dashboard') }}" class="under">Dashboard</a></li>
      @else
        <li><a href="/login" class="under">Login</a></li>
      @endif
          {{-- <li><a href="/register" class="under">Register</a></li> --}}

          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                </div>
        </ul>
      </div>
      <div class="heading1">
        <ion-icon name="menu" class="ham"></ion-icon>
      </div>
      <script>
        window.addEventListener('transcriptionCompleted', (event) => {
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.value = event.detail.transcription;
            } else {
                console.error('Search input not found');
            }
        });
    </script>

    </header>





{{-- original code --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }} ">
  </head>

  <body>
    <header>
      <div class="logo"><a href="{{url('/')}}">CWR Shop</a></div>
      <div class="menu">
        <a href="#">
          <ion-icon name="close" class="close"></ion-icon>
        </a>

      </div>
      <div class="search">
        <form class="example" action="" style="margin:auto;max-width:300px">
          <input type="text" placeholder="Search.." name="search" value="">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="heading">
        <ul>
          <button class="button" id="Ok"><a href= "{{url('/image-search')}}"><img src="{{ asset('img/header/google lens.webp') }}" alt="car" width="30" height="25"></a></button>
          <button class="button" id="Ok"><a href= "{{url('/voice-search')}}"><img src="{{ asset('img/header/google mic.png') }}" alt="car" width="30" height="25"></a></button>
          <li><a href= "{{url('/')}}" class="under">HOME</a></li>
          <li><a href="{{url('/shop')}}" class="under">SHOP</a></li>

          <li><a href="/login" class="under">Login</a></li>
          {{-- <li><a href="/register" class="under">Register</a></li> --}}

          {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                </div>
        </ul>
      </div>
      <div class="heading1">
        <ion-icon name="menu" class="ham"></ion-icon>
      </div>
    </header> --}}
