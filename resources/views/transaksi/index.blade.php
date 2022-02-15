@extends('gentelella')

@section('content')

{{-- form --}}
<form action='pembelian' method="POST" id="formTransaksi">
    @csrf
   <div class="row">
       <div class="col-md-6 form-group">
           <label  for="" class="control-label col-md-6 col-sm-6 col-xs-12">Tanggal Pembelian
           </label>
           <div class="col-md-6 col-sm-12 col-xs-12">
               <input name="tanggal_masuk" class="date-picker form-control col-md-12 col-xs-12" required="required" type="date" value="{{ date('Y-m-d') }}">
           </div>
       </div>

        <div class="col-md-6 form-group">
            <label for="" class="control-label col-md-6 col-sm-6 col-xs-12">Distributor
            </label>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <select class="form-control col-md-12 col-xs-12" required="required" name="pemasok_id">
                        <option value="{{ Auth::user()->outlet->id }}">{{ Auth::user()->outlet->nama }}</option>
                </select>
            </div>
        </div>
   </div>

   <div class="card mt-3">
    <div class="card">
        <div class="card-header">
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihPelanggan">
           Pilih Pelanggan
             </button>
        </div>
   
     <div class="card-body">
         <div class="data-pelanggan">
             <table class="table table-bordered">
                <tr>
                    <td width="10%" class="table-primary" scope="row">No.KTP</td>
                    <td width="25%"><input type="text" name="ktp_pembeli" readonly id="v-ktp" style="border:none"></td>
                    <td width="10%" class="table-primary">Nama</td>
                    <td wodth="25%"><span id="v-nama"></span></td>
                </tr>
                <tr>
                    <td class="table-primary">Alamat</td>
                    <td><span id="v-alamat"></span></td>
                    <td class="table-primary">Telepon</td>
                    <td><span id="v-telp"></span></td>
                </tr>
             </table>
         </div>
     </div>
   </div>
   </div>

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
        <label class="control-label mt-2">&nbsp;
        </label>
        <div class="col-md-9 col-ms-9 col-xs-12">
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" id="tblpaket" data-target="#paket">
                tambah Paket
              </button>
        </div>
    </div>
   </div>


   

    {{-- modal barang --}}
        <!-- Modal -->
        <div class="modal fade" id="paket" tabindex="-1" role="dialog" aria-labelledby="paketLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="paketLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <table class="table" id="tblBarang2">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis</th>
                            {{-- <th scope="col">Produk Id</th> --}}
                            <th scope="col">Nama Paket</th>
                            {{-- <th scope="col">Satuan</th> --}}
                            <th scope="col">Harga</th>
                            {{-- <th scope="col">Stok</th> --}}
                            <th scope="col">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tb_paket as $p )
                        <tr>
                            <td>{{ $loop->iteration }}<input type="hidden"  class="idBarang" value="{{ $p->id }}"></td>
                            <td>{{$p->jenis}}</td>
                            <td>{{$p->nama_paket}}</td>
                            <td>{{$p->harga}}</td>
                            <td><button type="button" class="pilihBarang btn btn-primary">Pilih</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    {{-- end modal barang --}}

      {{-- bagian detail barang pembelian --}}
   <div>
    <h3>Barang</h3>
    <table id="tblTransaksi" class="table table-striped table-bordered bulk_action">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" style="text-align:center;font-style:italic">Belum ada data</td>
            </tr>
        </tbody>
    </table>
</div>

 {{-- end bagian detail barang pembelian --}}
  {{-- bagian total, submit, data hidden --}}

  <div class="row" style="text-align: right;margin-bottom:10px">
    <div class="col-md-12">
        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-6" style="text-align: right;">
            <label class="control-label col-md-3 col-sm-6 col-xs-12">Total Harga
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: right; margin-right:0;padding-right:0">
                <input   class="form-control col-md-6 col-xs-12" name="total" required="required" type="text" id="totalharga">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12" style="text-align: right; margin-right:0;padding-right:0">
        <div class="col-md-12 col-sm-9 col-xs-12">
            <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        </div>
    </div>
</div>

{{-- end bagian total, submit, data hidden --}}
  

</form>



@endsection