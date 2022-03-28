<div class="modal fade" id="MalikBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="malikbarang">Input Data Barang</h5>
        </div>
        <div class="modal-body">
            <form action="barang" method="post">
            @csrf
            {{-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Id</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="id">
            </div>  --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang">
            </div> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Qty</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="qty">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="harga">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Waktu Beli</label>
                <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="waktu_beli">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Supplier</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="supplier">
            </div>    
            <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Status</label>
                  <select id="status" name="status" required="required" class="form-control" >
                    <option value="diajukan_beli">Diajukan Beli</option>
                    <option value="habis">Habis</option>
                    <option value="tersedia">Tersedia</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Waktu Update</label>
                <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="waktu_update">
            </div>    
            
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>

        <div style="margin-top:20px">
            @if(session('success'))
            <div class="alert alert-danger" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            @endif

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            
            @endif
        </div>
        </form>
        </div>
    </div>
    </div>
</div>