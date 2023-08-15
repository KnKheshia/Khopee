@extends('layouts.app')

@section('content')

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="../public/img/1.jpeg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Carousel Satu</h1>
                <p>Ini Carousel 1</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="../public/img/2.jpeg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Carousel Dua</h1>
                <p>Ini Carousel 2</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="../public/img/3.jpeg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Carousel Tiga</h1>
                <p>Ini Carousel 3</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="../public/img/1.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>1</h2>
            <p>Ini Deskripsi 1</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="../public/img/2.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>2</h2>
            <p>Ini Deskripsi 2</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="../public/img/3.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>3</h2>
            <p>Ini Deskripsi 3</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">1<span class="text-muted"></span></h2>
            <p class="lead">Ini Deskripsi 1</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="../public/img/1.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">2<span class="text-muted"></span></h2>
            <p class="lead">Ini Deskripsi 2</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="../public/img/2.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">3<span class="text-muted"></span></h2>
            <p class="lead">Ini Deskripsi 3</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="../public/img/3.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>
  @endsection