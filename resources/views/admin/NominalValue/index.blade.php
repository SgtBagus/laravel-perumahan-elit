@extends('admin.layouts.layouts')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('nominal-value.update', $datas->id) }}" id="quickForm" method="POST">
              @csrf
              @method('PUT')
                <input type="hidden" name="id" value={{ $datas->id }}>
                <div class="form-group">
                    <label>Total Nominal per Meter</label>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                </div>
                                <input type="text" name="nominal" class="form-control" value={{ $datas->value }}>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Catatan : </label>
                    <textarea class="form-control" rows="5" name="note" placeholder="Alamat...">{{ $datas->note }}</textarea>
                </div>
                <div class="form-group">
                    <label>Updated at : </label>
                    {{ date_format($datas->updated_at,"d M Y H:i:s") }}
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
  <script src="{{ asset('/') }}plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="{{ asset('/') }}plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="{{ asset('/') }}plugins/sweetalert2/sweetalert2.min.js"></script>

  <script>   
    $(document).ready(function() {
        $('#quickForm').validate({
            rules: {
                nominal: {
                    required: true,
                },
            },
            messages: {
                nominal: {
                    required: "Tidak Boleh Kosong",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
  </script>
@endpush