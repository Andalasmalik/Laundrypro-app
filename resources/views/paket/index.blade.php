@extends('gentelella')
@section('content')
@include('paket.modal-paket')
@include('paket.import')
        <div class="card">
        <div class="card-header">
            <h3 class="card-litle">Paket</h3>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MalikPaket">
                    Tambah Data Paket
                </button>
                <a href="Export/PaketExport" class="btn btn-success" > 
                    <i class="">Export Excel </i>
                </a>
                <button class="btn btn-warning" data-target="#importExcel" data-toggle="modal">Import Excel </button>
            </div>

                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Id Outlet</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tb_paket as $p )
                            <tr>    
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$p->outlet->nama}}</td>
                                <td>{{$p->jenis}}</td>
                                <td>{{$p->nama_paket}}</td>
                                <td>{{$p->harga}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $p->id }}">
                                        Update
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="malikpaket">Update</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('paket/'. $p->id) }}" method="post">
                                                    @method('PUT')
                                                @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Id Outlet</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="outlet_id" value="{{ old('outlet_id', $p->outlet_id) }}">
                                                    </div> 
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Jenis</label>
                                                        <select id="jenis" name="jenis" required="required" class="form-control" value="{{ old('jenis', $p->jenis) }}" >
                                                            <option>kiloan</option>
                                                            <option>selimut</option>
                                                            <option>bed_cover</option>
                                                            <option>kaos</option>
                                                            <option>lain</option>
                                                          </select>
                                                    </div> 
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nama Paket</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_paket" value="{{ old('nama_paket', $p->nama_paket) }}">
                                                    </div> 
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="harga" value="{{ old('harga', $p->harga) }}">
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
                                    <form action="/paket/{{ $p->id }}" method="post" class="d-inline">
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