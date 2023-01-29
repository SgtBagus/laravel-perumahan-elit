@extends('admin.layouts.layouts')
@push('title-name')
  AdminLTE 3 | Dashboard
@endpush
@push('css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}/dist/css/adminlte.min.css">
@endpush

@section('content')
 
Water Payment

@endsection

@push('js')
  <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
  <script src="{{ asset('/') }}plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}dist/js/adminlte.js"></script>
@endpush