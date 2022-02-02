@extends('gentelella')

        @section('content')
            <div class="card">
            <div class="card-header">
                <h3 class="card-litle">Member</h3>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MalikMember">
                        Tambah Data Member
                    </button>
                </div>
                
                    {{-- <div style="margin-top:20px">
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
                    </div> --}}

                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tb_member as $m )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$m->nama}}</td>
                                    <td>{{$m->alamat}}</td>
                                    <td>{{$m->jenis_kelamin}}</td>
                                    <td>{{$m->tlp}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $m->id }}">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="malikmember">Edit Member</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('member/'. $m->id) }}" method="post">
                                                        @method('PUT')
                                                    @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="{{ old('nama', $m->nama) }}">
                                                        </div> 
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" value="{{ old('alamat', $m->alamat) }}">
                                                        </div> 
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                                            {{-- <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_kelamin" value="{{ old('jenis_kelamin', $m->jenis_kelamin) }}"> --}}
                                                            <select id="jenis_kelamin" name="jenis_kelamin" required="required" class="form-control" value="{{ old('jenis_kelamin', $m->jenis_kelamin) }}" >
                                                                <option>P</option>
                                                                <option>L</option>
                                                              </select>
                                                        </div> 
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Telepon</label>
                                                            <input type="text" class="form-control" id="exampleInputEmail1" name="tlp" value="{{ old('tlp', $m->tlp) }}">
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
                                        <form action="/member/{{ $m->id }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <input type="hidden" name="_method" value="Delete"> --}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
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

        @include('member.modal-member')
        @endsection