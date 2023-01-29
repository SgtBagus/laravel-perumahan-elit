@extends('admin.layouts.layouts')
@push('css')
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link rel="stylesheet" href="{{ asset('/') }}plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <h2 class="card-title">Water Payment List</h2>
        </div>
        <div class="col-12 col-md-6">
          <div class="float-right">
            <button type="button" class="btn btn-outline-primary mr-2">
              <i class="fas fa-download mr-2"></i>
              Download Laporan
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
              <i class="fas fa-plus mr-2"></i>
              Add Data
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-header">
      <form>
        <div class="d-flex align-items-end">
          <div class="mx-1 flex-grow-1">
            <label>Range Date :</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="text" class="form-control float-right" id="reservation">
            </div>
          </div>
          <div class="mx-1 flex-grow-1">
            <label>Status :</label>
            
            <select class="form-control">
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
              <option>option 4</option>
              <option>option 5</option>
            </select>
          </div>
          <div class="mx-1 flex-grow-1">
            <label>Search :</label>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Cari...">
            </div>
          </div>
          <div class="mx-1">
            <button type="button" class="btn btn-primary">
              Submit
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Trident</td>
            <td>Internet
              Explorer 4.0
            </td>
            <td>Win 95+</td>
            <td> 4</td>
            <td>X</td>
            <td>
              <a href="{{ asset('/admin/water-payment/view/') }}" type="button" class="btn btn-primary">
                <i class="fas fa-eye"></i>
              </a>
              <button type="button" class="btn btn-danger btn-delete">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td>Trident</td>
            <td>a Explorer 4.0</td>
            <td>Win 95+</td>
            <td> 4</td>
            <td>X</td>
            <td>
              <a href="{{ asset('/admin/water-payment/view/') }}" type="button" class="btn btn-primary">
                <i class="fas fa-eye"></i>
              </a>
              <button type="button" class="btn btn-danger btn-delete">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create - Water Payment Data</h4>
        </div>
        <form id="quickForm">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pengguna</label>
                  <select class="form-control select2bs4" name="user" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alamat :</label>
                  <textarea class="form-control" rows="5" name="alamat" disabled placeholder="Alamat..."></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 table-responsive">
                <label>Data Bualanan Pengguna :</label>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>Wes Anderson umami biodiesel</td>
                      <td>$50.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Meteran Bulan Kemarin</label>
                  <input type="number" name="lastmountmeter" id="last-mount-date-input" class="form-control" placeholder="Meteran Bulan Kemarin">
                  <div class="custom-control custom-checkbox my-2">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <label for="customCheckbox1" class="custom-control-label">Ambil Data Meteran Bulan Kemarin</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Meteran Bulan ini</label>
                  <input type="number" name="currentmountmeter" class="form-control" placeholder="Meteran Bulan Ini">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Total Meteran</label>
                  <input type="number" class="form-control" placeholder="Total Meteran" Value="2" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Data Nominal per Meter</label>
                  <input type="number" class="form-control" placeholder="Data Nominal per Meter" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Total Nominal Pengeluaran Bulan ini</label>
                  <input type="number" class="form-control" placeholder="Total Nominal Pengeluaran Bulan ini" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Catatan Tambahan :</label>
                  <textarea class="form-control" rows="5" placeholder="Catatan..."></textarea>
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
@endsection

@push('js')
  <script src="{{ asset('/') }}plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('/') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>>
  <script src="{{ asset('/') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ asset('/') }}plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="{{ asset('/') }}plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="{{ asset('/') }}plugins/select2/js/select2.full.min.js"></script>
  <script src="{{ asset('/') }}plugins/sweetalert2/sweetalert2.min.js"></script>

  <script src="{{ asset('/') }}plugins/moment/moment.min.js"></script>
  <script src="{{ asset('/') }}plugins/daterangepicker/daterangepicker.js"></script>

  <script>   
    $(document).ready(function() {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [[1, 'asc']],
        "columnDefs": [{
          "targets": 5,
          "orderable": false
        }]
      });
      
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
      $('#reservation').daterangepicker();
      $('#customCheckbox1').click(function() {
        $('#last-mount-date-input').prop("disabled", this.checked).val("156289");
      });
    
      $('#quickForm').validate({
        rules: {
          user: {
            required: true,
          },
          alamat: {
            required: true,
          },
          lastmountmeter: {
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
          alamat: {
            required: "Tidak Boleh Kosong",
          },
          lastmountmeter: {
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
            Swal.fire(
              'Terhapus!',
              'Data Tersebut Berhasil di Hapus',
              'success'
            )
          }
        })
      });
    });
  </script>
@endpush