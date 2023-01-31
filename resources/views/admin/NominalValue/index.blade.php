@extends('admin.layouts.layouts')

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="quickForm">
                <div class="form-group">
                    <label>Total Nominal per Meter</label>
                    <div class="row">
                        <div class="col-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-block btn-primary">Kalkulasi Nominal Air per Meter</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label>Total Nominal Calulator</label>
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Meter</th>
                                            <th>Nominal</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
