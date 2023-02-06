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
                                    @if(Auth::user()->role !== 'user')
                                        <th>Action</th>
                                    @endif
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
                                                                <input type="hidden" name="typeEdit" value="meterEdit" placeholder="Meteran Sekarang...">
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
                                        <td>
                                            @if (($list->status) === 1)
                                              <label class="fx-bold">Lunas</label>
                                            @else
                                              <label class="fx-bold text-danger">Belum Lunas</label>
                                            @endif
                                        </td>
                                        @if(Auth::user()->role !== 'user')
                                            <td>
                                                <form action="{{ route('detail_payment_lists.update', $list->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    @if ((Auth::user()->role === 'admin'))
                                                            @if (($list->status) === 1)
                                                                <input type="hidden" name="typeEdit" value="status" />
                                                                <input type="hidden" name="status" value="0" />
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fas fa-ban"></i>
                                                                </button>
                                                            @else
                                                                <input type="hidden" name="typeEdit" value="status" />
                                                                <input type="hidden" name="status" value="1" />
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            @endif
                                                        <button type="button" class="btn btn-danger btn-delete" data-id={{ $list->id }}>
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @elseif ((Auth::user()->role === 'noted'))
                                                        <button type="button" class="btn btn-danger btn-delete" data-id={{ $list->id }}>
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @elseif ((Auth::user()->role === 'casher'))
                                                        @if (($list->status) === 1)
                                                            <button href="submit" type="button" class="btn btn-danger">
                                                                <i class="fas fa-ban"></i>
                                                            </button>
                                                        @else
                                                            <button href="submit" type="button" class="btn btn-success">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        @endif
                                                    @endif
                                                </form>
                                            </td>
                                        @endif
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
                                <tr>
                                    <th><b>Total Dana belum Lunas</b></th>
                                    <th><b>:</b></th>
                                    <td><b>Rp. {{ $totalDepts }}.00,-</b></td>
                                </tr>
                            </table>
                            <a href="{{ route('water-payment.index') }}" type="button" class="btn btn-info btn-block">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>