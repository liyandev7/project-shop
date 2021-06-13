<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/plugins/iCheck/flat/blue.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('/dist/css/custom-style.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body class="hold-transition login-page">
    <canvas class=
"background"
></canvas>
    @yield('content')
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            })
        })

    </script>

    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>

    <script>
        window.
onload
= function() {
  Particles.
init
({

// normal options
selector:
'.background'
,
  maxParticles:
450
,

// options for breakpoints
  responsive: [
    {
      breakpoint:
768
,
      options: {
        maxParticles:
200
,
        color:
'#48F2E3'
,
        connectParticles:
false
      }
    }, {
      breakpoint:
425
,
      options: {
        maxParticles:
100
,
        connectParticles:
true
      }
    }, {
      breakpoint:
320
,
      options: {
        maxParticles:
0

// disables particles.js
      }
    }
  ]
  });
};
    </script>

    @include('sweet::alert')
</body>

</html>
