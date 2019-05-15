
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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  
  <style type="text/css">
    .red { font-size:small; color:red; }
  </style>
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
                        <li class="dropdown active">
                        <a href="{{ route('frontend.schedule') }}">Schedule</a>
                        </li>
                        <li class="dropdown">
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
          <h3>Schedule <strong>Information</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="{{ route('frontend.index') }}">Home</a><span class="divider">/</span></li>
            <li class="active">Schedule</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
  <div class="container">
    @if(Session::has('success'))
      <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{ Session::get('success') }}</strong>
      </div>
    @endif
    @if(Session::has('error'))
      <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{ Session::get('error') }}</strong>
      </div>
    @endif
  </div>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h4>Our Schedule</h4>
          <!-- start: Accordion -->
          <div class="accordion" id="accordion2">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
						<i class="icon-minus"></i> Kalender Peminjaman</a>
              </div>
              <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                {!! $calendar_details->calendar() !!}
                <br>
                @if($ok == "Y")
                <div class="row alert alert-info" style="margin-left: 2px;">
                  <div class="span5">
                    <label><p><strong>Aula : </strong>{{$rental->room->room}}</p></label>
                    <label><p><strong>Tanggal : </strong>{{$rental->tgl_awal}}</p></label>
                    <label><p><strong>Waktu : </strong>{{$rental->time->waktu}}</p></label>
                    <label><p><strong>Acara : </strong>{{$rental->acara}}</p></label>
                  </div>
                  <div class="span5">
                    <label><p><strong>Status : </strong>{{$rental->status->name}}</p></label>
                    <label><p><strong>Nama : </strong>{{$rental->peminjam}}</p></label>
                    <label><p><strong>Prodi : </strong>{{$rental->prodi->name}}</p></label>
                    <label><p><strong>No HP : </strong>{{$rental->no_hp}}</p></label>
                  </div>
                </div>
                @endif
                <p>NB:<p>
                  <ul>
                    <li><p>Untuk melihat data peminjaman secara lengkap silahkan klik tombol berwarna hijau atau tombol berwarna orange pada kalender peminjaman.</p></li>
                    <li><p>Kalender aula yang memiliki tombol hijau berarti sudah mendapatkan konfirmasi dari pihak pengelola aula.</p></li>
                    <li><p>Kalender aula yang memiliki tombol orange berarti belum mendapatkan konfirmasi dari pihak pengelola aula.</p></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
						<i class="icon-plus"></i> Form Peminjaman</a>
              </div>
              <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                  <div class="comment-post">
                    <form action="{{ route('submit') }}" method="post" class="comment-form" name="comment-form" enctype="multipart/form-data">
                    @csrf
                      <div class="row">
                        <div class="span6">
                          <label>Nama </label>
                          <input type="text" name="peminjam" style="background: #FFFFFF;" value="{{ old('peminjam') }}" required />
                        </div>
                        <div class="span5">
                          <label>Prodi</label>
                          <select name="prodi_id" style="height: 38px; width: 103%;" value="{{ old('prodi_id') }}" required >
                            <option value="">Pilihan</option>
                            @foreach( $prodis as $prodi )
                            <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="span6">
                          <label>No. HP </label>
                          <input type="text" name="no_hp" style="background: #FFFFFF;" value="{{ old('no_hp') }}" required />
                        </div>
                        <div class="span5">
                          <label>Alamat di UNIDA</label>
                          <input type="text" name="alamat" style="background: #FFFFFF;" value="{{ old('alamat') }}" required />
                        </div>
                      </div>

                      <div class="row">
                        <div class="span6">
                          <label>Tujuan</label>
                          <select name="staff_id" style="height: 38px; width: 103%;" value="{{ old('staff_id') }}" required >
                            <option value="">Tujuan</option>
                            @foreach( $staffs as $staff )
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="span5">
                          <label>Hall</label>
                          <select name="room_id" style="height: 38px; width: 103%;" value="{{ old('room_id') }}" required >
                            <option value="">Pilihan</option>
                            @foreach( $halls as $hall )
                            <option value="{{ $hall->id }}">{{ $hall->room }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="span6">
                          <label>Tanggal Pemakaian</label>
                          <input type="date" name="tgl_awal" id="tgl" style="background: #FFFFFF;" value="{{ old('tgl_awal') }}" required />
                        </div>
                        <div class="span5">
                          <label>Waktu</label>
                          <select name="time_id" style="height: 38px; width: 103%;" value="{{ old('time_id') }}" required >
                            <option value="">Pilihan</option>
                            @foreach( $times as $time )
                            <option value="{{ $time->id }}">{{ $time->waktu }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="span6">
                          <label>Acara </label>
                          <input type="text" name="acara" style="background: #FFFFFF;" value="{{ old('acara') }}" required />
                        </div>
                        <div class="span5">
                          <label>Scan Surat</label>
                          <input type="file" name="surat" style="background: #FFFFFF;" value="{{ old('surat') }}" accept="image/jpeg,image/jpg,image/png," required />
                        </div>
                      </div>
                      
                      <div class="text-center">
                        <button class="btn btn-color btn-rounded" id="submit" type="submit">Lapor Peminjaman</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end: Accordion -->
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
  <script src="/front/assets/js/animate.js"></script>
  <script src="/front/assets/js/jquery.ui.totop.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="/front/assets/js/custom.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="/front/datatables/jquery.dataTables.js"></script>
  <script src="/front/datatables/dataTables.bootstrap4.js"></script>

  <!-- Demo scripts for this page-->
  <script src="/front/demo/datatables-demo.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  {!! $calendar_details->script() !!}


  

</body>

</html>
