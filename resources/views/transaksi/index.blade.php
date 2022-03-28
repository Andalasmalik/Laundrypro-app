@extends('gentelella')

@section('content')

{{-- form --}}
<form action='pembelian' method="POST" id="formTransaksi">
    @csrf
    <div class="row">
        <div class="col-md-12 form-group">
           <label  for="" class="control-label col-md-6 col-sm-6 col-xs-12">Tanggal Pembelian
           </label>
            <div class="col-md-6 col-sm-12 col-xs-12">
               <input name="tgl" class="date-picker form-control col-md-12 col-xs-12" required="required" type="date" value="{{ date('Y-m-d') }}">
            </div>
           
        </div>
        <div class="col-md-12 form-group">
            <label for="" class="control-label col-md-6 col-sm-6 col-xs-12">Esimasi selesai
            </label>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <input name="batas_waktu" class="date-picker form-control col-md-12 col-xs-12" required="required" type="date" value="{{ date('Y-m-d' , strtotime(date('Y-m-d') . '+3 day')) }}">
                </div>
        </div>
        <div class="col-md-12 form-group">
             <label for="" class="control-label col-md-6 col-sm-6 col-xs-12">Distributor
             </label>
             <div class="col-md-6 col-sm-12 col-xs-12">
                 <select class="form-control col-md-12 col-xs-12" required="required" name="pemasok_id">
                         <option value="{{ Auth::user()->outlet->id }}">{{ strtoupper(Auth::user()->outlet->nama)  }}</option>
                 </select>
             </div>
         </div>
    </div>
  
   <div class="card mt-3">
    <div class="card">
        {{-- <div class="card-header">
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tblMember">
           Pilih Member
             </button>
        </div> --}}
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" id="tambahBarangBtn" data-target="#tblMember">
                tambah member
              </button>
        </div>
   
        <div class="modal fade" id="tblMember" tabindex="-1" role="dialog" aria-labelledby="tblMemberLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="tblMemberLabel">Data Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <table class="table" id="tblMember2">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            {{-- <th scope="col">Produk Id</th> --}}
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Telepon</th>
                            {{-- <th scope="col">Stok</th> --}}
                            <th scope="col">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tb_member as $m )
                        <tr>
                            <td>{{ $loop->iteration }}<input type="hidden"  class="idBarang" value="{{ $m->id }}"></td>
                            <td>{{$m->nama}}</td>
                            {{-- <td>{{$m->produk_id}}</td> --}}
                            <td>{{$m->alamat}}</td>
                            <td>@switch($m->jenis_kelamin)
                                @case('L')
                                    <span>Laki-laki</span>
                                    @break
                                @case('P')
                                    <span>Perempuan</span>
                                    @break
                                @default
                                    
                                @endswitch
                            </td>
                            <td>{{$m->tlp}}</td>
                            {{-- <td>{{$m->stok}}</td> --}}
                            <td><button type="button" class="pilihMember btn btn-primary">Pilih</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

     <div class="card-body">
         <div class="data-pelanggan">
             <table class="table table-bordered">
                <tr>
                    <td width="10%" class="table-primary" scope="row">Nama</td>
                    <td width="25%"><input type="text" name="nama" readonly id="v-nama" style="border:none"></td>
                    <td width="10%" class="table-primary">Jenis Kelamin</td>
                    <td wodth="25%"><span id="v-jenis_kelamin"></span></td>
                </tr>
                <tr>
                    <td class="table-primary">Alamat</td>
                    <td><span id="v-alamat"></span></td>
                    <td class="table-primary">Telepon</td>
                    <td><span id="v-tlp"></span></td>
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
                <h5 class="modal-title" id="paketLabel">Data Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <table class="table" id="tblPaket2">
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
                            <td><button type="button" class="pilihpaket btn btn-primary">Pilih</button></td>
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
                <th>Jenis Paket</th>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Keterangan</th>
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
@include('transaksi.pembayaran')
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

@push('script')
    
<script>
  var totalharga = 0;
  function tambahBarang(a){
      let d = $(a).closest('tr');
      let jenis = d.find('td:eq(1)').text();
      let nama_paket = d.find('td:eq(2)').text();
      let harga = d.find('td:eq(3)').text();
      let idBarang = d.find('.idBarang').val();
      let data = '';
      let tbody = $('#tblTransaksi tbody tr td').text();
      data += '<tr>';
      data += '<td>'+jenis+'</td>';
      data += '<td>'+nama_paket+'</td>';
      data += '<td>'+harga+'</td>';
      data += '<input type="hidden" name="barang_id[]" value="'+idBarang+'">';
      data += '<input type="hidden" name="harga_beli[]" value="'+harga+'">';
      // data += '<input type="hidden" name="sub_total[]" value="'+harga*parseInt($('#qty_barang').val())+'">';
      data += '<td><input type="number" value="1" min="1" class="qty form-control" name="qty[]"></td>';
      data += '<td><input type="text" readonly name="sub_total[]" class="subTotal form-control-plaintext" value="'+harga+'"></td>';
      data += '<td><input type="text" placeholder="keterangan"  class="form-control" name="keterangan[]"></td>';
      data += '<td><button type="button" class="btnRemoveBarang btn btn-danger"><span class="fa fa-remove"></span></button></td>';
      if(tbody =='Belum ada data') $('#tblTransaksi tbody tr').remove(); 

      $('#tblTransaksi tbody').append(data);
      totalharga += parseFloat(harga);
      $('#totalharga').val(totalharga);
      $('#paket').modal('hide');
  }
  
  function calcSubTotal(a){
    let qty = parseInt($(a).closest('tr').find('.qty').val());
    let harga = parseFloat($(a).closest('tr').find('td:eq(2)').text());
    let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
    let subTotal = qty * harga;
    totalharga += subTotal - subTotalAwal;
    $(a).closest('tr').find('.subTotal').val(subTotal);
    $('#totalharga').val(totalharga);

  }

//event
$(function(){
  $('#tblPaket2').DataTable();

  //pembelian barang
  $('#paket').on('click','.pilihpaket',function(){
    tambahBarang(this);
  })

  //change qty event
  $('#formTransaksi').on('change','.qty',function(){
    calcSubTotal(this);
  })

  //remove barang
  $('#formTransaksi').on('click','.btnRemoveBarang',function(){
    let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
    totalharga -= subTotalAwal;

    $currrentRow = $(this).closest('tr').remove();
    $('#totalharga').val(totalharga);
  })
})

  </script>

  <script>
       $(function(){
            $('#tblMember2').DataTable();
          $('#tblMember2').on('click', '.pilihMember', function(){
                let ele = $(this).closest('tr');
                let nama = ele.find('td:eq(1)').text();
                let alamat = ele.find('td:eq(2)').text();
                let jenis_kelamin = ele.find('td:eq(3)').text();
                let tlp = ele.find('td:eq(4)').text();
                $('#v-nama').val(nama);
                $('#v-alamat').text(alamat);
                $('#v-jenis_kelamin').text(jenis_kelamin);
                $('#v-tlp').text(tlp)
                $('#tblMember').modal('hide');
            });

            Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
            });

            $('#cash_tgl').val(new Date().toDateInputValue());

            //validasi pemilihan pembeli dan moil
            $('#f-cash').submit(function(e){
            e.preventDefault();
            if($('#v-ktp').val() == ""){
                alert('data pelanggan belum dipilih')
            
            }else if($('#v-kode-mobil').val() == ""){
                alert('data mobil belum dipilih')

            }else{
                e.currentTarget.submit()
            }
            })
            })
  </script>
@endpush