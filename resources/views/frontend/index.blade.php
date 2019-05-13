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
  <link href="/front/assets/css/flexslider.css" rel="stylesheet">
  <link href="/front/assets/css/refineslide.css" rel="stylesheet">
  <link href="/front/assets/css/font-awesome.css" rel="stylesheet">
  <link href="/front/assets/css/animate.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

  <link href="/front/assets/css/style.css" rel="stylesheet">
  <link href="/front/assets/color/default.css" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="/front/assets/ico/favicon.ico">
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
    <div class="cbp-af-header">
      <div class=" cbp-af-inner">
        <div class="container">
          <div class="row">

            <div class="span4">
              <!-- logo -->
              <div class="logo">
                <h1><a href="index.html">UnidaHall</a></h1>
                <!-- <img src="assets/img/logo.png" alt="" /> -->
              </div>
              <!-- end logo -->
            </div>

            <div class="span8">
              <!-- top menu -->
              <div class="navbar">
                <div class="navbar-inner">
                  <nav>
                    <ul class="nav topnav">
                      <li class="dropdown active">
                        <a href="{{ route('frontend.index') }}">Home</a>
                      </li>
                      <li class="dropdown">
                        <a href="{{ route('frontend.schedule') }}">Schedule</a>
                      </li>
                      <li class="dropdown">
                        <a href="{{ route('frontend.hall') }}">Hall</a>
                      </li>
                      <li class="dropdown">
                        <a href="{{ route('frontend.contact') }}">Contact</a>
                      </li>
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
  <section id="intro">

    <div class="container">
      <div class="row">
        <div class="span6">
          <h2><strong>Selamat Datang di <span class="highlight primary">UnidaHall</span></strong></h2><br>
          <p class="lead" style="text-align: justify;">
            Untuk melakukan perizinan peminjaman aula di Universitas Darussalam Gontor, mahasiswa diharuskan mengikuti tahap-tahap peminjaman sebagai berikut.
          </p>
          <ul class="list list-ok strong bigger">
            <li>Mengecek Jadwal Peminjaman</li>
            <li>Mendownload Surat Peminjaman</li>
            <li>Mengisi Form Peminjaman</li>
            <li>Menunggu Konfirmasi</li>
          </ul>

        </div>
        <div class="span6">

          <div class="group section-wrap upper" id="upper">
            <div class="section-2 group">
              <ul id="images" class="rs-slider">
                <li class="group">
                  <a href="#">
				            <img src="/front/assets/img/slides/refine/slide01.jpg" alt="" />
				        </a>
                </li>
                <li class="group">
                  <a href="#" class="slide-parent">
				            <img src="/front/assets/img/slides/refine/slide02.jpg" alt=""/>
				        </a>
                </li>
                <li class="group">
                  <img src="/front/assets/img/slides/refine/slide03.jpg" alt="" />
                </li>
              </ul>
            </div>
            <!-- /.section-2 -->
          </div>

        </div>
      </div>
    </div>

  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="features">
            <div class="icon">
              <i class="icon-bg-light icon-circled icon-calendar icon-5x active"></i>
            </div>
            <div class="features_content">
              <h3>Mengecek</h3>
              <p class="left" style="text-align: justify;">
                <b>Langkah pertama</b>, mengecek jadwal pemakaian aula pada menu 
                <i>Schedule->Kalender Peminjaman</i>. Dengan mengklik tombol hijau 
                atau orange pada kalender peminjaman, anda dapat melihat informasi lengkap peminjaman.
              </p>
              <a href="{{ route('frontend.schedule') }}" class="btn btn-color btn-rounded"><i class="icon-angle-right"></i> Jadwal</a>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="features">
            <div class="icon">
              <i class="icon-bg-light icon-circled icon-cloud-download icon-5x active"></i>
            </div>
            <div class="features_content">
              <h3>Mendownload</h3>
              <p class="left" style="text-align: justify;">
                <b>Langkah kedua</b>, mendowload format surat yang telah disediakan dan 
                melengkapi hal-hal yang diperlukan pada surat tersebut. Format surat dapat di-download 
                pada menu <i>Hall</i>.
              </p>
              <a href="{{ route('frontend.hall') }}" class="btn btn-color btn-rounded"><i class="icon-angle-right"></i> Surat</a>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="features">
            <div class="icon">
              <i class="icon-bg-light icon-circled icon-edit icon-5x active"></i>
            </div>
            <div class="features_content">
              <h3>Mengisi</h3>
              <p class="left" style="text-align: justify;">
                <b>Langkah ketiga</b>, mengisi form peminjaman pada menu <i>Schedule->Form Peminjaman</i>  
                dan meng-upload surat peminjaman yang telah di scan. Selanjutnya menuggu 
                konfirmasi persetujuan dari pengelola aula yang dipinjam.
              </p>
              <a href="{{ route('frontend.schedule') }}" class="btn btn-color btn-rounded"><i class="icon-angle-right"></i> Form</a>
            </div>
          </div>
        </div>

      </div>

      <!-- blank divider -->
      <div class="row">
        <div class="span12">
          <div class="blank10"></div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <div class="cta-box">
            <div class="cta-text">
              <h3>UNTUK MELIHAT <b>INFORMASI AULA</b> SILAHKAN KLIK TOMBOL DISAMPING INI</h3>
            </div>
            <div class="cta" style="padding-top: 30px;">
              <a class="btn btn-large btn-rounded btn-color" href="{{ route('frontend.hall') }}">
					<i class="icon-chevron-right"></i> Our Hall</a>
            </div>
          </div>
          <!-- end tagline -->
        </div>
      </div>

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
                Designed by <a href="https://unida.gontor.ac.id/">Universtas Darussalam Gontor</a>
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
