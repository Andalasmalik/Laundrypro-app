@extends('gentelella')

{{-- @section('sidebar')
    @include('side-content.side-bar')
@endsection --}}


@section('content')
@include('user.modal-user')
    <div class="card">
    <div class="card-header">
        <h3 class="card-litle">User</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MalikUser">
                Tambah Data User
            </button>
        </div>
    

            <br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col"> Outlet</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$u->nama}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->outlet->nama}}</td>
                            <td>{{$u->role}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $u->id }}">
                                    Update
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="malikoutlet">Update</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('outlet/'. $u->id) }}" method="post">
                                                @method('PUT')
                                            @csrf
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nama </label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="{{ old('nama', $u->nama) }}">
                                                  </div> 
                                                  <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email', $u->email) }}">
                                                  </div> 
                                                  <div class="mb-3">
                                                      <label for="exampleInputEmail1" class="form-label">Password</label>
                                                      <input type="password" class="form-control mb-2"  id="myInput" name="password" value="{{ old('password', $u->password) }}">
                                                      <input type="checkbox" onclick="myFunction()"> Show 
                                                  </div> 
                                                  <div class="mb-3">
                                                      <label for="exampleInputEmail1" class="form-label">Id Outlet</label>
                                                      <input type="text" class="form-control" id="exampleInputEmail1" name="outlet_id" value="{{ old('outlet_id', $u->outlet_id) }}">
                                                  </div> 
                                                  <div class="mb-3">
                                                      <label for="exampleInputEmail1" class="form-label">Role</label>
                                                      <input type="text" class="form-control" id="exampleInputEmail1" name="role" value="{{ old('role', $u->role) }}">
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
                                <form action="/outlet/{{ $u->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <input type="hidden" name="_method" value="Delete"> --}}
                                    <button type="submit" class="btn delete-outlet btn-danger">Delete</button>
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

{{-- @include('user.modal-user') --}}
@endsection

@push('script')
    <script>
    </script>
@endpush