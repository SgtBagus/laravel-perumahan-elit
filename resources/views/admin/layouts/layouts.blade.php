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
        <link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        @stack('css')
    </head>
    <body class="sidebar-mini layout-navbar-fixed">
        <div class="wrapper">
            @include('admin.layouts.components.header')
            @include('admin.layouts.components.sidebar')
        
            <div class="content-wrapper">
                <section class="content-header">
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
    <script src="{{ asset('/') }}plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                Swal.fire({
                    title: 'Anda Yakin Ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                }).then((result) => {
                    if (result.isConfirmed) {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('/admin/detail_payment_lists/delete/') }}"+id,
                        dataType: 'JSON',
                        data:{
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function (data) {
                            if (data.success){
                                swal.fire({
                                    title: "Terhapus!",
                                    text: "Data Tersebut Berhasil di Hapus!",
                                    icon: "success",
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        },
                        error: function (xhr) {
                            Swal.fire(
                                'GAGAL!',
                                'Terjadi Kesalahan',
                                'error'
                            )
                        }
                    });
                    }
                })
            });
        });
    </script>
    @stack('js')
</html>
