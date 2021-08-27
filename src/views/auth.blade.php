<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config( 'app.name' ) }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    {{ Html::style( 'plugins/adminlte/plugins/fontawesome-free/css/all.min.css' ) }}
    <!-- icheck bootstrap -->
    {{ Html::style( 'plugins/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ) }}
    <!-- Theme style -->
    {{ Html::style( 'plugins/adminlte/css/adminlte.min.css' ) }}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#">{{ config( 'app.name' ) }}</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            @yield( 'content' )
        </div>
    </div>
</div>
    <!-- jQuery -->
    {{ Html::script( 'plugins/adminlte/plugins/jquery/jquery.min.js' ) }}
    <!-- Bootstrap 4 -->
    {{ Html::script( 'plugins/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js' ) }}
    <!-- AdminLTE App -->
    {{ Html::script( 'plugins/adminlte/js/adminlte.min.js' ) }}
</body>
</html>