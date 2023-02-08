
@push('css')
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link rel="stylesheet" href="{{ asset('/') }}plugins/daterangepicker/daterangepicker.css">
@endpush

<div class="card">
  @include('components.formWaterPaymet')
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Di Update Oleh</th>
          <th>Update Terakhir</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($paymentLists as $paymentList)
        <tr>
          <td>{{ $loop->index+1}}</td>
          <td>{{ $paymentList->pemilik }}</td>
          <td>{{ $paymentList->pembuat }}</td>
          <td>{{ date_format($paymentList->updated_at,"d M Y H:i:s") }}</td>
          <td>
              @if ((Auth::user()->role === 'admin'))
                <a href="{{ route('water-payment.show', $paymentList->id) }}" type="button" class="btn btn-primary">
              @elseif ((Auth::user()->role === 'noted'))
                  <a href="{{ route('noted.show', $paymentList->id) }}" type="button" class="btn btn-primary">
              @else
                <a href="{{ route('casher.show', $paymentList->id) }}" type="button" class="btn btn-primary">
              @endif
              <i class="fas fa-eye"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
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
        "lengthChange": true,
        "searching": true,
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