<!DOCTYPE html>
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
      <div class="logo"><a href="#">CWR Shop</a></div>
      <div class="menu">
        <a href="#">
          <ion-icon name="close" class="close"></ion-icon>
        </a>

        <ul>
          <li><a href="#" class="under">HOME</a></li>
          <li><a href="#" class="under">SHOP</a></li>
          <li><a href="#" class="under">OUR PRODUCTS</a></li>
          <li><a href="#" class="under">CONTACT US</a></li>
          <li><a href="#" class="under">ABOUT US</a></li>
        </ul>
      </div>
      <div class="search">

        <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
          <input type="text" placeholder="Search.." name="search2">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="heading">
        <ul>
          <button class="button" id="Ok"><a href= "imgsrh.html"><img src="{{ asset('img/header/google lens.webp') }}" alt="car" width="30" height="25"></a></button>
          <button class="button" id="Ok"><a href= "imgsrh.html"><img src="{{ asset('img/header/google mic.png') }}" alt="car" width="30" height="25"></a></button>
          <li><a href="#" class="under">HOME</a></li>
          <li><a href="#section2" class="under">SHOP</a></li>
          <li><a href="#section2"class="under">OUR PRODUCTS</a></li>
          <li><a href="#footer" class="under">CONTACT US</a></li>
          <li><a href="#footer" class="under">ABOUT US</a></li>
          <li><a href="#footer" class="under">ABOUT US</a></li>
          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                </div>
        </ul>
      </div>
      <div class="heading1">
        <ion-icon name="menu" class="ham"></ion-icon>
      </div>
    </header>
