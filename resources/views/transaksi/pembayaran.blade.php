<h1>Pembayaran</h1>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Biaya Tambahan</label>
            <input type="number" class="form-control" name="biaya_tambahan" id="exampleFormControlInput1" value="0" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Diskon</label>
            <input type="number" class="form-control" name="diskon" id="exampleFormControlInput1" value="0" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Pajak</label>
            <input type="number" class="form-control" name="pajak" id="exampleFormControlInput1" value="0" >
          </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Pembayaran</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" value="{{ date('Y-m-d') }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Status</label>
            <select id="inputState" class="form-control" name="status">
                <option selected>Baru</option>
                <option>Proses</option>
                <option>Selesai</option>
                <option>Diambil</option>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Dibayar</label>
            <select id="inputState" class="form-control" name="pembayaran" >
              <option value="belum_dibayar" selected>Belum DIbayar</option>
                <option value="dibayar" >Dibayar</option>
              </select>
          </div>
    </div>
</div>