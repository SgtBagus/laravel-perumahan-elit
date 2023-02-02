
@push('css')
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link rel="stylesheet" href="{{ asset('/') }}plugins/daterangepicker/daterangepicker.css">
@endpush

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
        <th>No</th>
        <th>Nama</th>
        <th>Total Harga</th>
        <th>Status</th>
        <th>Catatan</th>
        <th>Di Update Oleh</th>
        <th>Update Terakhir</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Bagus</td>
        <td>25000</td>
        <td>
          <label class="fx-bold">Lunas</label>
        </td>
        <td>test</td>
        <td>Bagus</td>
        <td>08-02-12</td>
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
        <td>2</td>
        <td>Bagus</td>
        <td>25000</td>
        <td>
          <label class="fx-bold">Lunas</label>
        </td>
        <td>test</td>
        <td>Bagus</td>
        <td>08-02-12</td>
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
        "scrollX": true
      });
          
      $('#reservation').daterangepicker();
    });
  </script>
@endpush