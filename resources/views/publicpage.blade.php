<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/logo_22K_icon.ico" type="image/x-icon">
    <title>chocobean</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="/img/logo.jpg" width="60px" height="20px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link glyphicon glyphicon-shopping-cart" aria-hidden="true" href="{{ url('/publicpage/shoppingcart')}}">Shopping Cart
               <span class="badge badge-light">{{ Session::has('cart')?Session::get('cart')->totalQty:'' }}</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <br>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Chocolate</a>
            <a href="#" class="list-group-item">Coffee</a>
            <a href="#" class="list-group-item">Tea</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
             <!---- Start of slide -->
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="/img/banner1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="/img/banner2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="/img/slidre3 copy.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
           <!---- End of slide -->

          <div class="row">
             @foreach($hr_request as $hrR)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="/storage/uploads/{{ $hrR->picture }}" width="50px" height="200px" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{ $hrR->name }}</a>
                  </h4>
                  <h5>৳ {{ $hrR->price }}</h5>
                  <h5>  {{ $hrR->brand }}</h5>
                  <a href="{{ url('/publicpage/addToCart',['id'=>$hrR->id]) }}" class="btn btn-success pull-right" role="button">Add to cart</a>
                </div>
              </div>
            </div>
            @endforeach


          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

