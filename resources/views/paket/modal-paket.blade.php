
  <!-- Modal -->
<div class="modal fade" id="MalikPaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="malikpaket">Input Data Paket</h5>
        </div>
        <div class="modal-body">
            <form action="paket" method="post">
            @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Id Outlet </label>
                  <select id="jenis" name="outlet_id" required="required" class="form-control" >
                    <option value="{{ Auth::user()->outlet_id }}">{{ Auth::user()->outlet->nama }}</option>
                  </select>
                </div> 
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Jenis</label>
                  <select id="jenis" name="jenis" required="required" class="form-control" >
                    <option>kiloan</option>
                    <option>selimut</option>
                    <option>bed_cover</option>
                    <option>kaos</option>
                    <option>lain</option>
                  </select>
                </div> 
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Paket</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama_paket">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="harga">
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


{{-- <table class="table">
<thead>
  <tr>
    <th scope="col">No</th>
    <th scope="col">Nama Produk</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  @foreach ($produk as $produk )
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{$produk->nama_produk}}</td>
    <td>Otto</td>
  </tr>
</tbody>
</table> --}}