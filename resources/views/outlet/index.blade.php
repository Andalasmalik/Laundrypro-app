@extends('gentelella')

@section('content')
    <div class="card">
    <div class="card-header">
        <h3 class="card-litle">Outlet</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MalikOutlet">
                Tambah Data outlet
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
                            <th scope="col">Tlp</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tb_outlet as $o )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$o->nama}}</td>
                            <td>{{$o->alamat}}</td>
                            <td>{{$o->tlp}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $o->id }}">
                                    Update
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $o->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="malikoutlet">Modal title</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('outlet/'. $o->id) }}" method="post">
                                                @method('PUT')
                                            @csrf
                                                <div class="mb-3">
                                                     <label for="exampleInputEmail1" class="form-label">nama</label>
                                                     <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="{{ old('nama', $o->nama) }}">
                                                </div> 
                                                <div class="mb-3">
                                                     <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                                     <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" value="{{ old('alamat', $o->alamat) }}">
                                                </div> 
                                                <div class="mb-3">
                                                     <label for="exampleInputEmail1" class="form-label">tlp</label>
                                                     <input type="text" class="form-control" id="exampleInputEmail1" name="tlp" value="{{ old('tlp', $o->tlp) }}">
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
                                <form action="/outlet/{{ $o->id }}" method="post" class="d-inline">
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

@include('outlet.modal-outlet')
@endsection

@push('script')
    <script>
        $(function(){
        // Data Table
        $('#table').DataTable()

        // Alert
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("success-alert").slideUp(500);
        });

        $("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("success-alert").slideUp(500);
        });

        // Delete Alert
        $('.delete-outlet').click(function(e){
            e.preventDefault()
            let data = $(this).closest('tr').find('td:eq(4)').text()
            swal({
                title: "Apakah Kamu Yakin?", 
                text: "Yakin Ingin Menghapus Data yang anda pilih?",
                icon: "warning",
                buttons:true,
                dangerMode: true,
            })
            .then((req) => {
                if(req) $(e.target).closest('form').submit()
                else swal.close()
            })
        })
}};
    </script>
@endpush