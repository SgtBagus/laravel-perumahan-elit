@extends('layouts.layouts')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="invoice p-3 mb-3">
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
              <address>
                <strong>NANTI NAMA NYA DISINI</strong><br>
                DISINI ALAMAT NYA<br>
                Email: EMAIL NYA DISINI
              </address>
              
              <i>Keterangan : <b>M. (Meteran Air)</b></i>
            </div>
            <div class="col-sm-6 invoice-col text-right">
              Tanggal: {{date('d-m-Y')}}
              <br />
              <h1 class="text-danger">Belum Lunas</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>M. Bulan Kemarin</th>
                        <th>M. Bulan Sekarang</th>
                        <th>Kenaikan M.</th>
                        <th>Biaya per Meter</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2022-02-01</td>
                        <td>2312123</td>
                        <td>2312223</td>
                        <td>15</td>
                        <td>500000</td>
                        <td>1500000</td>
                        <td>
                          <label class="fx-bold">Lunas</label>
                        </td>
                        <td>
                          <a href="#" type="button" class="btn btn-success disabled">
                            <i class="fas fa-check"></i>
                          </a>
                          <a href="#" type="button" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                          </a>
                          <button type="button" class="btn btn-danger btn-delete">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2022-02-01</td>
                        <td>2312123</td>
                        <td>2312223</td>
                        <td>15</td>
                        <td>500000</td>
                        <td>1500000</td>
                        <td>
                          <label class="fx-bold text-danger">Belum Lunas</label>
                        </td>
                        <td>
                          <a href="#" type="button" class="btn btn-success">
                            <i class="fas fa-check"></i>
                          </a>
                          <a href="#" type="button" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
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

          <div class="row justify-content-end">
            <div class="col-3">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th><b>Total:</b></th>
                    <td><b>$265.24</b></td>
                  </tr>
                </table>
                <button type="button" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Lunaskan Semua
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Catatan:</h5>
          This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
        </div>
      </div>
    </div>
  </div>
@endsection
