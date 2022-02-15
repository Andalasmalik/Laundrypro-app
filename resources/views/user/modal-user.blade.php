
  <!-- Modal -->
  <div class="modal fade" id="MalikUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="malikuser">Input Data User</h5>
        </div>
        <div class="modal-body">
            <form action="user" method="post">
            @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama">
                </div> 
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="email">
                </div> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" class="form-control mb-2"  id="myInput" name="password">
                    <input type="checkbox" onclick="myFunction()"> Show 
                </div> 
                <div class="mb-3">
                    <label for="outlet" class="form-label">Id Outlet</label>
                    <select id="outlet" name="outlet_id" required="required" class="form-control col-8" >
                      @foreach($tb_outlet as $o)
                      <option value="{{ $o->id }}">{{ $o->nama  }}</option>
                     @endforeach
                    </select>
                </div> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Role</label>
                    <select id="role" name="role" required="required" class="form-control col-8" >
                      <option>Kasir</option>
                      <option>Owner</option>
                      <option>Admin</option>
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

@push('script')
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
