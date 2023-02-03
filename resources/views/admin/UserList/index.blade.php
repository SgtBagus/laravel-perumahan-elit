@extends('admin.layouts.layouts')
@include('sweetalert::alert')

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
        <div class="col-12">
          <h2 class="card-title">UserList</h2>
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
            <th>Updated Date</th>
            <th>Created Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->index+1}}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ date_format($user->updated_at,"d M Y H:i:s") }}</td>
            <td>{{ date_format($user->created_at,"d M Y H:i:s") }}</td>
            <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $user->id }}">
                <i class="fas fa-eye"></i>
              </button>
              
              <div class="modal fade" id="modal-{{ $user->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Create - Water Payment Data</h4>
                    </div>
                    <form action="{{ route('user-list.update', $user->id) }}" id="quickForm" method="POST">
                      @csrf
                      @method('PUT')

                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Nama Pengguna" value={{ $user->name }}>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" class="form-control" placeholder="Email Pengguna" value={{ $user->email }}>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Alamat :</label>
                              <textarea class="form-control" rows="5" name="address" placeholder="Alamat...">{{ $user->address }}</textarea>
                            </div>
                          </div>
                        </div>
                        {{-- {{if($user->role === "user" )}} --}}
                        <div class="row">
                          <div class="col-md-12">
                            <label>Role :</label>
                            <select class="form-control select2bs4" name="role" style="width: 100%;">
                              <option
                                value="admin"
                                {{ ($user->role === "admin" ) ? 'selected' : ''}}
                              >
                                Admin
                              </option>
                              <option
                                value="casher"
                                {{ ($user->role === "casher" ) ? 'selected' : ''}}
                              >
                                Kasir
                              </option>
                              <option
                                value="noted"
                                {{ ($user->role === "noted" ) ? 'selected' : ''}}
                                
                              >
                                Pencatat Meteran
                              </option>
                              <option
                                value="user"
                                {{ ($user->role === "user" ) ? 'selected' : ''}}
                              >
                                User
                              </option>
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

              <button type="button" class="btn btn-danger btn-delete" data-id={{ $user->id }}>
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
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
          name: {
            required: true,
          },
          email: {
            required: true,
          },
          address: {
            required: true,
          },
          role: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Tidak Boleh Kosong",
          },
          email: {
            required: "Tidak Boleh Kosong",
          },
          address: {
            required: "Tidak Boleh Kosong",
          },
          role: {
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
            var userId = $(this).attr('data-id');
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