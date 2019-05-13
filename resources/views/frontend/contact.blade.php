
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
                            <li class="dropdown">
                            <a href="{{ route('frontend.hall') }}">Hall</a>
                            </li>
                            <li class="dropdown active">
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
  <!-- Subhead
================================================== -->
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3>Contact <strong>Information</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="{{ route('frontend.index') }}">Home</a><span class="divider">/</span></li>
            <li class="active">Contact</li>
          </ul>
        </div>
      </div>
    </div>

  </section>

  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span4">
          <aside>
            <div class="widget">
              <h4>Our Information</h4>
              <ul>
                <li><label><strong>Phone : </strong></label>
                  <p>
                    (0352)483762<br>
                    (0342)484143
                  </p>
                </li>
                <li><label><strong>Email : </strong></label>
                  <p>
                    sarana.prasarana@unida.gontor.ac.id <br>
                    hotel.unida@unida.gontor.ac.id <br>
                    sirah.nabawiah@unida.gontor.ac.id
                  </p>
                </li>
                <li><label><strong>Office address : </strong></label>
                  <p>
                    Gedung Utama Lama Universitas Darussalam Gontor <br>
                    Gedung Hotel Universitas Darussalam Gontor <br>
                    Gedung GPSN Universitas Darussalam Gontor 
                  </p>
                </li>
              </ul>
            </div>
            <div class="widget">
              <h4>Social network</h4>
              <ul class="social-links">
                <li><a href="#" title="Twitter"><i class="icon-bg-light icon-twitter icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Facebook"><i class="icon-bg-light icon-facebook icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Google plus"><i class="icon-bg-light icon-google-plus icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="icon-bg-light icon-linkedin icon-circled icon-1x active"></i></a></li>
                <li><a href="#" title="Pinterest"><i class="icon-bg-light icon-pinterest icon-circled icon-1x active"></i></a></li>
              </ul>
            </div>
          </aside>
        </div>
        <div class="span8">
          <div class="map-container">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6646.359132311242!2d111.48713738735223!3d-7.900419839633086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e790aa79efd972b%3A0xf09ed064954d29b2!2sUniversitas+Darussalam+Gontor!5e0!3m2!1sid!2sid!4v1555916798609!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="spacer30">
          </div>

          @if(Session::has('success'))
              <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ Session::get('success') }}</strong>
              </div>
          @endif

          <form action="{{ route('send') }}" method="post" role="form" class="contactForm">
          @csrf
            <div class="row">
              <div class="span4 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
              </div>
              <div class="span4 form-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required />
              </div>
              <div class="span4 form-group">
                <select name="staff_id" class="form-control" style="height: 38px; width: 103%;" required>
                  <option value="">Tujuan</option>
                  @foreach( $staffs as $staff )
                  <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="span4 form-group">
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required />
              </div>
              <div class="span8 form-group">
                <textarea name="pesan" class="form-control" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="text-center">
                  <button class="btn btn-color btn-rounded" type="submit">Send message</button>
                </div>
              </div>
            </div>
          </form>

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

  <!-- Contact Form JavaScript File -->
  <script src="/front/contactform/contactform.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="/front/assets/js/custom.js"></script>

</body>

</html>
