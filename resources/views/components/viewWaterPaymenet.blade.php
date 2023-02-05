    <div class="row">
        <div class="col-12">
            {{ $dataInvoices }}
            <div class="invoice p-3 mb-3">
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>{{ $dataInvoices->pemilik }}</strong><br>
                            Alamat: {{ $dataInvoices->alamat_pemilik }}<br>
                            Email: {{ $dataInvoices-> email_pemilik }}
                        </address>
                        
                        <i>Keterangan : <b>M. (Meteran Air)</b></i>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Diupdate Oleh: {{ $dataInvoices->pembuat }}</strong><br>
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col text-right">
                        Tanggal: {{ date_format($dataInvoices->updated_at,"d M Y H:i:s") }}
                        <br />
                        @if (($dataInvoices->status) === 1)
                            <h1 class="fx-bold">Lunas</h1>
                        @else
                            <h1 class="fx-bold text-danger">Belum Lunas</h1>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>M. Sebelumnya</th>
                                    <th>M. Sekarang</th>
                                    <th>Kenaikan M.</th>
                                    <th>Biaya per M.</th>
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
                                    <td>
                                        @if ((Auth::user()->role !== 'user') && (Auth::user()->role !== 'casher'))
                                            <input type="number" class="form-control" value="2312223" placeholder="Cari...">
                                        @elseif ((Auth::user()->role !== 'user') && (Auth::user()->role === 'noted'))
                                            2312223
                                        @endif
                                    </td>
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
                                    <td><b>Rp. {{ $dataInvoices->total_harga }}.00,-</b></td>
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
            <h5>Catatan:</h5>
                @if ((Auth::user()->role !== 'user') && (Auth::user()->role !== 'casher'))
                    <textarea class="form-control" rows="5" name="note" placeholder="Catatan...">{{ $dataInvoices->note }}</textarea>
                @elseif ((Auth::user()->role !== 'user') && (Auth::user()->role === 'noted'))
                    {{ $dataInvoices->note }}
                @endif
            </div>
        </div>
    </div>