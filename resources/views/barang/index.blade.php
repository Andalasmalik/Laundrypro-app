@extends('gentelella')
@section('content')
@include('barang.modal-barang')
        <div class="card">
        <div class="card-header">
            <h3 class="card-litle">Barang</h3>
            <div class="card-tools">
            </div>
        </div>

        @if(session()->has('succes'))
			<div class="alert alert-success" id="succes-alert" role="alert">
				{{session('succes')  }}
			</div>
			@endif

        <div class="card-body">
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MalikBarang">
                    Tambah Data Barang
                </button>
                <a href="Export/BarangExport" class="btn btn-success" > 
                    <i class="">Export Excel </i>
                </a>
                <button class="btn btn-warning" data-target="#" data-toggle="modal">Import Excel </button>
            </div>

                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table new_table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Waktu Beli</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Status</th>
                                <th scope="col">Waktu Update</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($penggunaan_barangs as $pb )
                            <tr>    
                                <td>{{ $loop->iteration }} <input type="hidden"  class="id" value="{{$pb->id}}"></td>
                                {{-- <td>{{$pb->id}}</td> --}}
                                <td>{{$pb->nama_barang}}</td>
                                <td>{{$pb->qty}}</td>
                                <td>{{$pb->harga}}</td>
                                <td>{{$pb->waktu_beli}}</td>
                                <td>{{$pb->supplier}}</td>
                                <td>
                                    <select name="status" class="status form-control" id="one">
                                        <option value="diajukan_beli" {{ $pb->status == 'diajukan_beli' ? 'selected' : '' }}>Diajukan Beli</option>
                                        <option value="habis" {{ $pb->status == 'habis' ? 'selected' : '' }}>Habis</option>
                                        <option value="tersedia" {{ $pb->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    </select>
                                </td>
                                <td>{{$pb->waktu_update}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $pb->id }}">
                                        Update
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $pb->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="malikbarang">Update</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('barang/'. $pb->id) }}" method="post">
                                                    @method('PUT')
                                                @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Id </label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="id" value="{{ old('id', $pb->id) }}">
                                                    </div> 
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nama Barang </label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang" value="{{ old('nama_barang', $pb->nama_barang) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Qty </label>
                                                        <input type="number" class="form-control" id="exampleInputEmail1" name="qty" value="{{ old('qty', $pb->qty) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">harga </label>
                                                        <input type="number" class="form-control" id="exampleInputEmail1" name="harga" value="{{ old('harga', $pb->harga) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Waktu Beli</label>
                                                        <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="waktu_beli" value="{{ old('waktu_beli', $pb->waktu_beli) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Supplier </label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="supplier" value="{{ old('supplier', $pb->supplier) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Status</label>
                                                        <select id="status" name="status" required="required" class="form-control" value="{{ old('status', $pb->status) }}" >
                                                            <option value="diajukan_beli">Diajukan Beli</option>
                                                            <option value="habis">Habis</option>
                                                            <option value="tersedia">Tersedia</option>
                                                          </select>
                                                    </div> 
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Waktu Update</label>
                                                        <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="waktu_update" value="{{ old('waktu_update', $pb->waktu_update) }}">
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
                                    <form action="/barang/{{ $pb->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <input type="hidden" name="_method" value="Delete"> --}}
                                        <button type="submit" class="delete btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            
            

        </div>
        {{-- /.card-body --}}
        <div class="card-footer">

        </div>
        {{-- /.card-footer --}}
        </div>

    
@endsection

@push('script')
    <script>
        $('.new_table').on('change', '.status' ,function(){
        let status     = $(this).closest('tr').find('.status').val()
        let id         = $(this).closest('tr').find('.id').val()
        let data        = {
                            id:id,
                            status:status,
                            _token: "{{csrf_token()}}"};
                            // console.log(data);
        $.post('{{ route("pstatus")}}',data,function(msg){

        })
        swal("Status Berhasil Di Ganti",{
            buttons: false,
            timer: 2000,
            icon: "success",
            });
        })

    </script>
@endpush