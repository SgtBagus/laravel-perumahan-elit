@extends('admin.layouts.layouts')


@push('css')
    <link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endpush

@section('content')

@include('components.viewWaterPaymenet')

@endsection

@push('js')
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
@endpush