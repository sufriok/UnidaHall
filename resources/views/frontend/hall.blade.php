
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Unida Hall</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Clean responsive bootstrap website template">
  <meta name="author" content="">
  <!-- styles -->
  <link href="/front/assets/css/bootstrap.css" rel="stylesheet">
  <link href="/front/assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="/front/assets/css/docs.css" rel="stylesheet">
  <link href="/front/assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="/front/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="/front/assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="/front/assets/css/flexslider.css" rel="stylesheet">
  <link href="/front/assets/css/refineslide.css" rel="stylesheet">
  <link href="/front/assets/css/font-awesome.css" rel="stylesheet">
  <link href="/front/assets/css/animate.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

  <link href="/front/assets/css/style.css" rel="stylesheet">
  <link href="/front/assets/color/default.css" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/front/assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/front/assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/front/assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="/front/assets/ico/apple-touch-icon-57-precomposed.png">

  <!-- =======================================================
    Theme Name: Plato
    Theme URL: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <header>
    <!-- Navbar
    ================================================== -->
    <div class=" cbp-af-header">
      <div class=" cbp-af-inner">
        <div class="container">
          <div class="row">

            <div class="span4">
              <!-- logo -->
              <a class="logo" href="index.html">
                <h1>UnidaHall</h1>
                <!-- <img src="assets/img/logo.png" alt="" /> -->
              </a>
              <!-- end logo -->
            </div>

            <div class="span8">
              <!-- top menu -->
              <div class="navbar">
                <div class="navbar-inner">
                    <nav>
                        <ul class="nav topnav">
                            <li class="dropdown">
                            <a href="{{ route('frontend.index') }}">Home</a>
                            </li>
                            <li class="dropdown">
                            <a href="{{ route('frontend.schedule') }}">Schedule</a>
                            </li>
                            <li class="dropdown active">
                            <a href="{{ route('frontend.hall') }}">Hall</a>
                            </li>
                            <li class="dropdown">
                            <a href="{{ route('frontend.contact') }}">Contact</a>
                            @auth
                            <li class="dropdown">
                            <a href="{{ route('home') }}">Sign In</a>
                            </li>
                            @else
                            <li class="dropdown">
                            <a href="{{ route('login') }}">Login</a>
                            </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
              </div>
              <!-- end menu -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Subhead
================================================== -->
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3>Hall <strong>Information</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="{{ route('frontend.index') }}">Home</a><span class="divider">/</span></li>
            <li class="active">Hall</li>
          </ul>
        </div>
      </div>
    </div>

  </section>

  <section id="maincontent">
    <div class="container">
      @foreach($halls as $hall)
      <div class="row">
        <div class="span12">
          <article>
            <div class="heading">
              <h3><strong>{{ $hall->room}}</strong></h3><hr>
            </div>
            <div class="clearfix">
            </div>
            <div class="row">
              <div class="span8">
                <!-- start flexslider -->                
                <img src="/upload/{{ $hall->image }}" alt=""/>
                <!-- end flexslider -->
                <div class="blank10"></div>
              </div>
              <div class="span4">
                <aside>
                  <div class="widget">
                    <h4>Informasi Aula</h4>
                    <ul class="project-detail">
                      <li><b>Nama Aula :</b> {{ $hall->room}}</li>
                      <li><b>Pengelola :</b> {{ $hall->staff->name }}</li>
                      <li><b>Pembimbing :</b> {{ $hall->pembimbing }}</li>
                      <li><b>Kapasitas :</b> {{ $hall->max }} Orang</li>
                      <li><b>Ukuran Banner :</b> {{ $hall->banner }}</li>
                      <li><b>Format Surat :</b> <a href="/upload/{{ $hall->surat }}" class="btn btn-color">Download</a></li>
                      <li><b>Fasilitas :</b> {{ $hall->vasilitas }}</li>
                    </ul>
                  </div>
                </aside>
              </div>
            </div>
          </article>
          <!-- end article full post -->
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- Footer
 ================================================== -->
  <footer class="footer">
    <div class="subfooter">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>
              &copy; UnidaHall - All right reserved
            </p>
          </div>
          <div class="span6">
            <div class="pull-right">
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Plato
                -->
                Designed by <a href="https://unida.gontor.ac.id/">Universitas Darussalam Gontor</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="/front/assets/js/jquery.js"></script>
  <script src="/front/assets/js/modernizr.js"></script>
  <script src="/front/assets/js/jquery.easing.1.3.js"></script>
  <script src="/front/assets/js/google-code-prettify/prettify.js"></script>
  <script src="/front/assets/js/bootstrap.js"></script>
  <script src="/front/assets/js/jquery.prettyPhoto.js"></script>
  <script src="/front/assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="/front/assets/js/portfolio/setting.js"></script>
  <script src="/front/assets/js/hover/jquery-hover-effect.js"></script>
  <script src="/front/assets/js/jquery.flexslider.js"></script>
  <script src="/front/assets/js/classie.js"></script>
  <script src="/front/assets/js/cbpAnimatedHeader.min.js"></script>
  <script src="/front/assets/js/jquery.refineslide.js"></script>
  <script src="/front/assets/js/jquery.ui.totop.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="/front/assets/js/custom.js"></script>

</body>

</html>
