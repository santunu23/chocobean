<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/logo_22K_icon.ico" type="image/x-icon">

    <title>chocobean||Cart</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <style>
    .footer {
    position: fixed;
    height: 100px;
    bottom: 0;
    width: 100%;
}
#table-short{
  width:50%;
  margin-left: 20%;
  margin-top: 2%;
}
  </style>
 

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/publicpage"><img src="/img/logo.jpg" width="60px" height="20px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <br>
    <div class="container">
      <div class="row">
      @if(Session::has('cart'))
      <br>
      <div id="table-short">
      <table class="table table-stripped">

                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                       </tr>
                       
                           @foreach((array) $products as $product)
                           <tr>
                            <td>{{ $product['item']['name'] }}</td>
                            <td>{{ $product['qty'] }}</td>
                            <td>{{ $product['price'] }}</td>
                          </tr>
                          @endforeach
                          <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Total:{{$totalPrice}}</strong></td>
                           </tr>
                          <tr>
                            
                            <td>Delivery Method</td>
                            <td><a href="#" type="button" class="btn btn-success">Payment on Delivery</a></td>
                            <td><a href="/publicpage/shoppingcart/emptycart" type="button" class="btn btn-danger">Empty Card</a></td>
                          </tr>
                        
                        </table>
                      </div>
                      @elseif (!Session::has('cart')) {
                            {{ 'No products Available on the cart please purchase something' }}
                      }

                         
                         @endif

</div>

      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark fixed-bottom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>


    <!-- Bootstrap core JavaScript -->
    
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </body>

</html>

