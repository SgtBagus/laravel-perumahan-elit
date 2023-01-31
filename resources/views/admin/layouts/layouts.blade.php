<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $titlePages }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}/dist/css/adminlte.min.css">
        @stack('css')
    </head>
    <body class="sidebar-mini layout-navbar-fixed">
        <div class="wrapper">
            @include('admin.layouts.components.header')
            @include('admin.layouts.components.sidebar')
        
            <div class="content-wrapper">
                <section class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-12">
                        <h1>{{ $titlePages }}</h1>
                      </div>
                    </div>
                  </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </div>

            @include('admin.layouts.components.footer')
        </div>
    </body>
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}dist/js/adminlte.js"></script>
    @stack('js')
</html>
