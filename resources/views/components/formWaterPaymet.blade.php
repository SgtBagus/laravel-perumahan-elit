
@push('css')
  <link rel="stylesheet" href="{{ asset('/') }}plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
  <div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create - Water Payment Data</h4>
        </div>
        <form action="{{ route('water-payment.store') }}" id="quickForm" method="POST">
          @csrf
          
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pengguna</label>
                  <select class="form-control select2bs4" name="user" style="width: 100%;">
                    @foreach ($userList as $user)
                      <option value={{ $user->id }}>
                        {{ $user->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Meteran Bulan ini</label>
                    </div>
                    <div class="col-md-6 text-right">
                      <small> Dana Nominal per Kenaikan Meter: <b>Rp {{ $mNominalValue }},00,-</b></small>
                    </div>
                  </div>
                  <input type="number" name="currentmountmeter" class="form-control" placeholder="Meteran Bulan Ini">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
@push('js')
  <script src="{{ asset('/') }}plugins/select2/js/select2.full.min.js"></script>
  <script src="{{ asset('/') }}plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="{{ asset('/') }}plugins/jquery-validation/additional-methods.min.js"></script>

  <script>   
    $(document).ready(function() {

      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });

      
      $('#quickForm').validate({
        rules: {
          user: {
            required: true,
          },
          currentmountmeter: {
            required: true,
          },
        },
        messages: {
          user: {
            required: "Tidak Boleh Kosong",
          },
          currentmountmeter: {
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
        }
      });
    });
  </script>
@endpush