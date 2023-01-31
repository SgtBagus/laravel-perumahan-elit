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
          <h2 class="card-title">UserList</h2>
        </div>
        <div class="col-12 col-md-6">
          <div class="float-right">
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
            <label>Role :</label>
            
            <select class="form-control">
              <option>Admin</option>
              <option>Kasir</option>
              <option>Pencatat Meter Air</option>
              <option>User</option>
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
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Role</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Bagus</td>
            <td>admin@gmail.com</td>
            <td>
              asdlkqjwelkqjwelkj alksdjlkqjwkwkwe
            </td>
            <td>Admin</td>
            <td>2022-12-42</td>
            <td>2022-12-42</td>
            <td>
              <button type="button" class="btn btn-primary btn-delete">
                <i class="fas fa-eye"></i>
              </button>
              <button type="button" class="btn btn-danger btn-delete">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>aBagus</td>
            <td>admin@gmail.com</td>
            <td>
              asdlkqjwelkqjwelkj alksdjlkqjwkwkwe
            </td>
            <td>Admin</td>
            <td>2022-12-42</td>
            <td>2022-12-42</td>
            <td>
              <button type="button" class="btn btn-primary btn-delete">
                <i class="fas fa-eye"></i>
              </button>
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
                  <label>Name</label>
                  <input type="text" name="userName" class="form-control" placeholder="Nama Pengguna">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="userEmail" class="form-control" placeholder="Email Pengguna" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alamat :</label>
                  <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat..."></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Role :</label>
                <select class="form-control select2bs4" name="user" style="width: 100%;">
                  <option>Admin</option>
                  <option>Kasir</option>
                  <option>Pencatat Meteran</option>
                  <option selected="selected">User</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
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
          userName: {
            required: true,
          },
          userEmail: {
            required: true,
          },
          alamat: {
            required: true,
          },
        },
        messages: {
          user: {
            required: "Tidak Boleh Kosong",
          },
          userEmail: {
            required: "Tidak Boleh Kosong",
          },
          alamat: {
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