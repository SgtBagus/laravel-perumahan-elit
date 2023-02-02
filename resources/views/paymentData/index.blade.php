@extends('layouts.layouts')

@push('css')
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link rel="stylesheet" href="{{ asset('/') }}plugins/daterangepicker/daterangepicker.css">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="card-title">Payment List</h2>
        </div>
        @include('components.formWaterPayment')
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
                <a href="{{ url()->current(); }}/view/sadwe" type="button" class="btn btn-primary">
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
                <a href="{{ url()->current(); }}/view/sadwe" type="button" class="btn btn-primary">
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
@endsection


@push('js')
  <script src="{{ asset('/') }}plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('/') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>>
  <script src="{{ asset('/') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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