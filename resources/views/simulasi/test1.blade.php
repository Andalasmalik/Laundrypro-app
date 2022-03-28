@extends('gentelella')
@section('content')

    <div class="card-header">
        <h3>Form</h3>
    </div>

    <div class="card-body">
        <form id="formKaryawan">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="id" placeholder="id" name="id" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="form-check col-sm-2">
                    <input type="radio" class="form-check-info" name="jk" id="jk" value="L">
                    <label class="form-check-info">Laki-Laki</label>
                </div>
                <div class="form-check col-sm-2">
                    <input type="radio" class="form-check-info" name="jk" id="jk" value="P">
                    <label class="form-check-info">Perempuan</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                    <button class="btn btn-default" id="btnReset" type="reset">Reset</button>
                </div>
            </div>

            
        </form>
    </div>

        {{-- Data --}}
        <div class="card">
            <div class="card-header">
                <h3>Data</h3>
            </div>
            <div class="card-body">
                <div>
                    <button class="btn btn-success" type="button" id="sorting"> Sorting</button>
                </div>
                <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" align="center">Belum Ada Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Data --}}

@endsection

@push('script')
<script>
        let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
        $('#tblKaryawan tbody').html(showData(dataKaryawan))


    function insert(){
        const data = $('#formKaryawan').serializeArray()
        let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
        let newData = {}
        data.forEach(function(item, index){
            let name = item['nama']
            let value = (name === 'id' 
                        ? Number(item['value']):item['value'])
                        newData[name] = value
        })
        // console.log(newData)
        dataKaryawan.push(newData);
        localStorage.setItem('dataKaryawan' , JSON.stringify(dataKaryawan))
        
    }
    function showData(arr){
        let row = ''
        if(dataKaryawan.length == 0){
            return row = '<tr><td colspan="3">Belum Ada Data</td></tr>'
        }
        arr.forEach(function(item, index){
            row += `<tr>`
            row += `<td>${item['id']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${item['jk']}</td>`
            row += `</tr>`
        })
        return row
    }

    // function InsertionSort(arr, key){
    //         let i, j, id, value;
    //         for(i =1; i < array.length; i++)
    //         {
    //             value = arr[i];
    //             id = arr[i][key]
    //             j = i - 1;
    //             while (j >= o $$ arr[j][key]>id)
    //             {
    //                 arr[j + 1] = arr[j];
    //                 j = j - 1;
    //             }
    //             arr[j + 1] = value;
    //         }
    //         return arr
    //     }

    $(function(){
        //property
        let dataKaryawan = []

        //event
        // $('#sorting').on('click', function(){
        //     dataKaryawan = insertionSort(dataKaryawan, 'id')

        //     $('#tblKaryawan tbody').html(showData(dataKaryawan))
        //     console.log(dataKaryawan)
        // })

        $('#formKaryawan').on('submit', function(e){
            e.preventDefault()
            insert()
            let dataKaryawan = JSON.parse(localStorage.getItem('datakaryawan')) || []
            $('#tblKaryawan tbody').html(showData(dataKaryawan))
            // console.log(dataKaryawan)
        })
        //end of event
    })
</script>
    
@endpush

