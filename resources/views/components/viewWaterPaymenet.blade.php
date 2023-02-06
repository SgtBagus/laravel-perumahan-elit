    <div class="row">
        <div class="col-12">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailsList as $list)
                                    <tr>
                                        <td>{{ $loop->index+1}}</td>
                                        <td>{{ date_format($list->created_at, "d M Y H:i:s") }}</td>
                                        <td>{{ $list->last_meter }}</td>
                                        <td>
                                            @if(($loop->last) && ($list->status !== 1))
                                                @if ((Auth::user()->role !== 'user') && (Auth::user()->role !== 'casher'))
                                                    <form action="{{ route('detail_payment_lists.update', $list->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input
                                                                    type="number"
                                                                    class="form-control"
                                                                    value={{ $list->current_meter }}
                                                                    name="currentMeter"
                                                                    placeholder="Meteran Sekarang..."
                                                                >
                                                                <input type="hidden" name="type" value="details" placeholder="Meteran Sekarang...">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @endif
                                            @else 
                                                {{ $list->current_meter }}
                                            @endif
                                        </td>
                                        <td>{{ $list->meter_added_value }}</td>
                                        <td>Rp {{ $mNominalValue }},00,-</td>
                                        <td>Rp {{ $list->total }},00,-</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr class="text-danger">
                                    <th><b>Kekurangan Denda:</b></th>
                                    <th><b>:</b></th>
                                    <td><b>Rp. {{ $totalDepts }}.00,-</b></td>
                                </tr>
                                <tr>
                                    <th><b>Total</b></th>
                                    <th><b>:</b></th>
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
        </div>
    </div>