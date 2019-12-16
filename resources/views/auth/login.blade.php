<!DOCTYPE html>
<html lang="es" class="loading">
  <!-- BEGIN : Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sistema de Administración de Vuelos y Pilotos.">
    <meta name="author" content="nextstation.cl">
    <title>Flightsys - Club Aéreo Concepción</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('app-assets/img/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('app-assets/img/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('app-assets/img/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('app-assets/img/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('app-assets/img/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{url('app-assets/img/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/app.css')}}">
    <!-- END APEX CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Login Page Starts-->
<form method="POST" action="{{ route('login') }}">
@csrf
<section id="login">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">
            <div class="card-body login-img">
              <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                  <img src="{{url('app-assets/img/gallery/login.png')}}" alt="" class="img-fluid mt-5" width="400" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <h4 class="mb-2 card-title">Iniciar Sesión</h4>
                  <p class="card-text mb-3">
                    Club Aéreo Concepción
                  </p>
                  <input type="text" name="rut" id="rut" class="form-control mb-3 @error('rut') is-invalid @enderror" placeholder="RUT" value="{{ old('rut') }}" oninput="checkRut(this)"/>
                  <input type="password" name="password" class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="Contraseña" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  <!--div class="d-flex justify-content-between mt-2">
                    <div class="forgot-password-option">
                      <a href="forgot-password-page.html" class="text-decoration-none text-primary">Forgot Password
                        ?</a>
                    </div>
                  </div-->
                  <div class="fg-actions d-flex justify-content-between">
                    <div class="recover-pass">
                      <input type="submit" class="btn btn-primary text-decoration-none text-white" value="Iniciar Sesión">
                    </div>
                  </div>
                  <hr class="m-0">
                  <p style="font-size: 0.5rem;">Copyright &copy; {{date('Y')}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
<!--Login Page Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{url('app-assets/vendors/js/core/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/vendors/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/vendors/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/vendors/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/vendors/js/prism.min.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/vendors/js/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/vendors/js/screenfull.min.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/vendors/js/pace/pace.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{url('app-assets/js/app-sidebar.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/js/notification-sidebar.js')}}" type="text/javascript"></script>
    <script src="{{url('app-assets/js/customizer.js')}}" type="text/javascript"></script>
    <!-- END APEX JS-->
    <script src="{{url('app-assets/js/jquery.rut.js')}}" type="text/javascript"></script>
    <script type="text/javascript">$("#rut").rut({formatOn: 'keyup'});</script>
    @include('layouts.sweetalert')
  </body>
  <!-- END : Body-->
</html>
