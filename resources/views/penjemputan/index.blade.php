@extends('gentelella')
@section('content')
@include('penjemputan.modal-penjemputan')
@include('penjemputan.import')
    <div class="card-header">
        <h3 class="card-litle">Penjemputan</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MalikPenjemput">
                Tambah Data Penjemput
            </button>
            <a href="Export/PenjemputExport" class="btn btn-success" > 
                <i class="">Export Excel </i>
            </a>
            <button class="btn btn-warning" data-target="#importExcel" data-toggle="modal">Import Excel </button>
        </div>

            <br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table new_table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Alamat Pelanggan</th>
                            <th scope="col">No Hp Pelanggan</th>
                            <th scope="col">Petugas Penjemput</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjemputan as $p )
                        <tr>
                            <td>{{$loop->iteration}} <input type="hidden"  class="id" value="{{$p->id}}"></td>
                            <td>{{$p->member->nama}}</td>
                            <td>{{$p->member->alamat}}</td>
                            <td>{{$p->member->tlp}}</td>
                            <td>{{$p->penjemput}}</td>
                            <td>
                                <select name="status" class="status form-control" id="one">
                                    <option value="tercatat" {{ $p->status == 'tercatat' ? 'selected' : '' }}>Tercatat</option>
                                    <option value="penjemputan" {{ $p->status == 'penjemputan' ? 'selected' : '' }}>Penjemputan</option>
                                    <option value="selesai" {{ $p->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $p->id }}">
                                    Update
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="malikjemput">Edit Petugas</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('penjemputan/'. $p->id) }}" method="post">
                                                @method('PUT')
                                            @csrf
                                                {{-- <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_pelanggan" value="{{ old('nama_pelanggan', $p->nama_pelanggan) }}">
                                                </div>  --}}
                                                {{-- <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" value="{{ old('alamat', $p->alamat) }}">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Telepon</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="tlp" value="{{ old('tlp', $p->tlp) }}">
                                                </div>  --}}
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Penjemputan</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="penjemput" value="{{ old('penjemput', $p->penjemput) }}">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Status</label>
                                                    {{-- <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_kelamin" value="{{ old('jenis_kelamin', $p->jenis_kelamin) }}"> --}}
                                                    <select id="status" name="status" required="required" class="form-control" value="{{ old('status', $p->status) }}" >
                                                        <option>Penjemputan</option>
                                                        <option>Tercatat</option>
                                                        <option>Selesai</option>
                                                      </select>
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
                                <form action="/penjemputan/{{ $p->id }}" method="post" class="d-inline">
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
        $.post('{{ route("status")}}',data,function(msg){

        })
        swal("Status Berhasil Di Ganti",{
            buttons: false,
            timer: 2000,
            icon: "success",
            });
        })

    </script>
@endpush