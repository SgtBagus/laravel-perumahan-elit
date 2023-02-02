<div class="col-md-6">
  <div class="float-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
      <i class="fas fa-plus mr-2"></i>
      Add Data
    </button>
  </div>
</div>

<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create - Water Payment Data</h4>
        </div>
        <form id="quickForm">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pengguna</label>
                  <select class="form-control select2bs4" name="user" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alamat :</label>
                  <textarea class="form-control" rows="5" name="alamat" disabled placeholder="Alamat..."></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 table-responsive">
                <label>Data Bualanan Pengguna :</label>
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
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>2022-02-01</td>
                          <td>2312123</td>
                          <td>2312223</td>
                          <td>15</td>
                          <td>500000</td>
                          <td>1500000</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Meteran Bulan Kemarin</label>
                  <input type="number" name="lastmountmeter" id="last-mount-date-input" class="form-control" placeholder="Meteran Bulan Kemarin">
                  <div class="custom-control custom-checkbox my-2">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <label for="customCheckbox1" class="custom-control-label">Ambil Data Meteran Bulan Kemarin</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Meteran Bulan ini</label>
                  <input type="number" name="currentmountmeter" class="form-control" placeholder="Meteran Bulan Ini">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Total Meteran</label>
                  <input type="number" class="form-control" placeholder="Total Meteran" Value="2" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Data Nominal per Meter</label>
                  <input type="number" class="form-control" placeholder="Data Nominal per Meter" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Total Nominal Pengeluaran Bulan ini</label>
                  <input type="number" class="form-control" placeholder="Total Nominal Pengeluaran Bulan ini" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Catatan Tambahan :</label>
                  <textarea class="form-control" rows="5" placeholder="Catatan..."></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>