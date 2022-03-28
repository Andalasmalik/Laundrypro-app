@extends('gentelella')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="cardT-title" >Simulasi Data Malik</h3>
        </div>

        <div class="card-body">
            <form action="" id="formbuku">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">ID Buku</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="id_buku" placeholder="Isi" name="id_buku" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">judul Buku</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="judulbuku" placeholder="isi" name="judulbuku" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="pengarang" placeholder="isi" name="pengarang" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="tahunterbit" required>
                            <option value="">Tahun Terbit</option>
                            @for ($i=date('Y'); $i> 1900; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Harga Buku</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="harga" placeholder="isi" name="harga" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="qty" placeholder="isi" name="qty" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                        <button class="btn btn-default" id="btnReset" type="button">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="cardT-title" >Simulasi Data Malik</h3>
        </div>


        
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend" id="button-addon3">
                    <button class="btn btn-success" type="button" id="sorting"> Sorting</button>
                  <button class="btn btn-outline-danger" type="button" id="btnSearch">Cari</button>
                </div>
                <input type="search" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3" name="search" id="search">
              </div>
            <table class="table table-compact table-stripped table-bordered " id="tblbuku" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Judul Buku</th>
                        <th>Pengaran</th>
                        <th>tahun Buku</th>
                        <th>Harga Buku</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" align="center">Belum Ada Data</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection

@push('script')

    <script>
        let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
        $('#tblbuku tbody').html(showData(dataBuku))

        // methods
        function insert(){
            const form = $('#formbuku').serializeArray()
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            let newData = {}
            form.forEach(function(item, index){
            let name = item['name']
            let value = (name === 'id_buku' ||
                         name === 'qty' ||
                         name === 'harga'
                        ? Number(item['value']):item['value'])
            newData[name] = value
        })
        // console.log(newData)
        dataBuku.push(newData);
        localStorage.setItem('dataBuku', JSON.stringify(dataBuku))
        }

        function showData(dataBuku){
        let row = ''
        // let arr = JSON.parse(localStorage.getItem('dataBuku') )|| []
        if(dataBuku.length == 0){
            return row = '<tr><td colspan="6" align="center">Belum Ada Data</td></tr>'
        }
        dataBuku.forEach(function(item, index){
            row += `<tr>`
            row += `<td>${item['id_buku']}</td>`
            row += `<td>${item['judulbuku']}</td>`
            row += `<td>${item['pengarang']}</td>`
            row += `<td>${item['tahunterbit']}</td>`
            row += `<td>${item['harga']}</td>`
            row += `<td>${item['qty']}</td>`
            row += `</tr>`
        })
        return row
        }

        function InsertionSort(dataBuku, key){
            let i, j, id_buku, value;
            for(i = 1; i < dataBuku.length; i++)
            {
                value = dataBuku[i];
                id_buku = dataBuku[i][key]
                j = i - 1;
                while (j >= 0 && dataBuku[j][key] > id_buku)
                {
                    dataBuku[j + 1] = dataBuku[j];
                    j = j - 1;
                }
                dataBuku[j + 1] = value;
            }
            return dataBuku
        }

        function searching(arr, key, teks){
            for(let i = 0; i < arr.length; i++){
                if(arr[i][key] == teks)
                return i 
            }
            return -1
        }


        // after load
        $(function(){
            // initialize
            
            // console.log(dataBuku)
            

            // event

            $('#formbuku').on('submit', function(e){
                e.preventDefault()
                insert()
                let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
                $('#tblbuku tbody').html(showData(dataBuku))
                
                
            })

            $('#btnReset').on('click', function(e){
                e.preventDefault()
                localStorage.removeItem('dataBuku')
                let dataBuku =  []
                $('#tblbuku tbody').html(showData(dataBuku))
                
            })

            $('#btnSearch').on('click', function(e){
                let teksSearch = $('#search').val()
                let id = searching(dataBuku, 'id_buku', teksSearch)
                let data = []
                if(id_buku >= 0)
                 data.push(dataBuku[id])
                console.log(id_buku)
                console.log(data)
                $('#tblbuku tbody').html(showData(data))
            })

            $('#sorting').on('click', function(){
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            dataBuku = InsertionSort(dataBuku, 'id_buku')
            console.log(dataBuku)
            // console.log('sort')
            $('#tblbuku tbody').html(showData(dataBuku))
            // console.log(dataBuku)
            })
        })
        

        
    </script>

@endpush