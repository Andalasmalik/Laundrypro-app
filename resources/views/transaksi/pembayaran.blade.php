<h1>Pembayaran</h1>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Biaya Tambahan</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Diskon</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Pajak</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" >
          </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Pembayaran</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" value="{{ date('Y-m-d') }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Status</label>
            <select id="inputState" class="form-control">
                <option selected>Baru</option>
                <option>Anyar</option>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Dibayar</label>
            <select id="inputState" class="form-control">
                <option selected>Dibayar</option>
                <option>Dianyar</option>
              </select>
          </div>
    </div>
</div>