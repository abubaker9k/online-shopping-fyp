<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/cartpage.css') }} ">
  </head>

<body>

<div class="container">
  <div class="heading">
    <h1>
      <span class="shopper">s</span> Shopping Cart
    </h1>

    <a href="#" class="visibility-cart transition is-open">X</a>
  </div>

  <div class="cart transition is-open">

    <a href="{{ url('/shipping') }}" class="btn btn-update">Update cart</a>


    <div class="table">

      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center ">
          Price
        </div>
        <div class="col col-qty align-center">QTY</div>
        <div class="col">VAT</div>
        <div class="col">Total</div>
      </div>

      <div class="layout-inline row">

        <div class="col col-pro layout-inline">
          <img src="http://static.ddmcdn.com/gif/10-kitten-cuteness-1.jpg" alt="kitten" />
          <p>Happy Little Critter</p>
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>£59.99</p>
        </div>

        <div class="col col-qty layout-inline">
          <a href="#" class="qty qty-minus">-</a>
            <input type="numeric" value="3" />
          <a href="#" class="qty qty-plus">+</a>
        </div>

        <div class="col col-vat col-numeric">
          <p>£2.95</p>
        </div>
        <div class="col col-total col-numeric">               <p> £182.95</p>
        </div>
      </div>

      <div class="layout-inline row row-bg2">

        <div class="col col-pro layout-inline">
          <img src="http://lovemeow.com/wp-content/uploads/2012/05/kitten81.jpg" alt="kitten" />
          <p>Scared Little Kittie</p>
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>£23.99</p>
        </div>

        <div class="col col-qty  layout-inline">
          <a href="#" class="qty qty-minus ">-</a>
            <input type="numeric" value="1" />
          <a href="#" class="qty qty-plus">+</a>
        </div>

        <div class="col col-vat col-numeric">
          <p>£1.95</p>
        </div>
        <div class="col col-total col-numeric">
          <p>£25.94</p>
        </div>

      </div>

       <div class="layout-inline row">

        <div class="col col-pro layout-inline">
          <img src="http://cdn.cutestpaw.com/wp-content/uploads/2012/04/l-my-first-kitten.jpg" alt="kitten" />
          <p>Curious Little Begger</p>
        </div>

        <div class="col col-price col-numeric align-center ">
          <p>£59.99</p>
        </div>

        <div class="col col-qty layout-inline">
          <a href="#" class="qty qty-minus">-</a>
            <input type="numeric" value="3" />
          <a href="#" class="qty qty-plus">+</a>
        </div>

        <div class="col col-vat col-numeric">
          <p>£2.95</p>
        </div>
         <div class="col col-total col-numeric">
           <p>£182.95</p>
         </div>
      </div>

       <div class="tf">
         <div class="row layout-inline">
           <div class="col">
             <p>VAT</p>
           </div>
           <div class="col"></div>
         </div>
         <div class="row layout-inline">
           <div class="col">
             <p>Shipping</p>
           </div>
           <div class="col"></div>
         </div>
          <div class="row layout-inline">
           <div class="col">
             <p>Total</p>
           </div>
           <div class="col"></div>
         </div>
       </div>
  </div>

    <a href="#" class="btn btn-update">Update cart</a>

</div>

</body>
