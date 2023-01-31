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
                            <button type="submit" class="btn btn-primary">Cek Example Water Meter</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label>Total Nominal Calulator</label>
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Meter</th>
                                            <th>Nominal</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>5</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>10</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>50</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>100</td>
                                            <td>Rp 5000,00</td>
                                            <td>Rp 15000,00</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>500</td>
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
