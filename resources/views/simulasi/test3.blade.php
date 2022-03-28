@extends('gentelella')
@section('content')

    <div class="card-body">
        <form id="formSimulasi">
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID Karyawan</label>
                        <input type="text" class="form-control" id="id_karyawan" placeholder="Isi" name="id_karyawan" required >
                      </div>
                      <div class="form-group">
                        <label for="jk" class=" col-form-label">Jenis Kelamin</label>
                        <div class="form-check ">
                            <input type="radio" class="form-check-info" name="jk" id="jk" value="L">
                            <label class="form-check-info">Laki-Laki</label>
                        </div>
                        <div class="form-check ">
                            <input type="radio" class="form-check-info" name="jk" id="jk" value="P">
                            <label class="form-check-info">Perempuan</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Jumlah Anak</label>
                        <input type="number" class="form-control" id="jumlah_anak" value="" min="0" name="jumlah_anak" required >
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" placeholder="Isi" name="nama_karyawan" required  >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Status Menikah</label>
                        <select id="inputState" class="form-control" id="status" placeholder="Isi" name="status" required>
                            <option selected name="status" value="Single">Single</option>
                            <option name="status" value="Couple">Couple</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mulai Bekerja</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
            </div>
            
            
            <div class="form-group row">
                <label for="nama" class="col-sm-0 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                    <button class="btn btn-default" id="btnReset" type="reset">Reset</button>
                </div>
            </div>

            
        </form>
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
                <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3" name="search" id="search">
              </div>
            <table class="table table-compact table-stripped table-bordered " id="tblsimulasi" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Status</th>
                        <th>Jml Anak</th>
                        <th>Mulai Bekerja</th>
                        <th>Gaji Awal</th>
                        <th>Tunjangan</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="12" align="center">Belum Ada Data</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td width="" colspan="6" align="center"  > Total </td>
                        <td id="total1"></td>
                        <td id="total2"></td>
                        <td id="total3"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

@push('script')
    <script>
        let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
        $('#tblsimulasi tbody').html(showData(dataSimulasi))

        // methods
        function insert(){
            const form = $('#formSimulasi').serializeArray()
            let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
            let newData = {}
            form.forEach(function(item, index){
            let name = item['name']
            let value = (name === 'id_karyawan' ||
                         name === 'jumlah_anak'
                        ? Number(item['value']):item['value'])
            newData[name] = value
        })
        // console.log(newData)
        dataSimulasi.push(newData);
        localStorage.setItem('dataSimulasi', JSON.stringify(dataSimulasi))
        }

        $('#status').on('change', function() {
            let value = $('#status').val()
            console.log(value)
            if (value == 'Single') {
                $('#jumlah_anak').val(0)
                $('#jumlah_anak').attr('readonly', true)
            } else {
                $('#jumlah_anak').attr('readonly', false)

            }
        })

        $('#jumlah_anak').on('change', function() {
            let value = $('#jumlah_anak').val()
            console.log(value)
            if (value >= 1) {
                $('#status').val('Couple')
                $('#status').attr('readonly', true)
            } else {
                $('#status').attr('readonly', false)

            }
        })
        //end of events

        // function calculateAge(birthday) {
        //     birthday = new Date(birthday)
        //     var ageDifms = Date.now() - birthday.getTime();
        //     var ageDate = new Date(ageDifms);
        //     return Math.abs(ageDate.getUTCFullYear - 1970);
        // }


        function showData(dataSimulasi){
        let row = ''
        // let arr = JSON.parse(localStorage.getItem('dataSimulasi') )|| []
        if(dataSimulasi.length == 0){
            return row = '<tr><td colspan="12" align="center">Belum Ada Data</td></tr>'
        }
        dataSimulasi.forEach(function(item, index){
                const awal = 2000000
                var bonusTahun = 150000
                var bonusAnak = 150000
                var bonusCouple = 250000

                dan = new Date(item['date'])
                var ageDifMs = Date.now() - dan.getTime();
                var ageDate = new Date(ageDifMs)
                var newAge = Math.abs(ageDate.getUTCFullYear() - 1970)
                var tahun = newAge * bonusTahun


                if (item['jumlah_anak'] >= 2) {
                    var child = 2
                } else if (item['jumlah_anak'] != 1) {
                    var child = 0
                } else {
                    var child = 1
                }

                let anak = 150000* child



                let status = (item['status'] === 'Couple' ? bonusCouple : 0)
                let tunjangan = anak + status + tahun

                let total = tunjangan + awal
        
        
            row += `<tr>`
            row += `<td>${item['id_karyawan']}</td>`
            row += `<td>${item['nama_karyawan']}</td>`
            row += `<td>${item['jk']}</td>`
            row += `<td>${item['status']}</td>`
            row += `<td>${item['jumlah_anak']}</td>`
            row += `<td>${item['date']}</td>`
            row += `<td>2000000</td>`
            row += `<td>${tunjangan}</td>`
            row += `<td>${total}</td>`
        })
        return row   
        }
        function total() {
                let table = document.getElementById('tblsimulasi').getElementsByTagName('tbody')[0]
                let total1 = 0
                let total2 = 0
                let total3 = 0

                for (let i = 0; i < table.children.length; i++) {
                    total1 += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText)
                    total2 += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText)
                    total3 += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText)
                }

                document.getElementById('total1').innerText = total1
                document.getElementById('total2').innerText = total2
                document.getElementById('total3').innerText = total3
            }


        function InsertionSort(dataSimulasi, key){
            let i, j, id_karyawan, value;
            for(i = 1; i < dataSimulasi.length; i++)
            {
                value = dataSimulasi[i];
                id_karyawan = dataSimulasi[i][key]
                j = i - 1;
                while (j >= 0 && dataSimulasi[j][key] > id_karyawan)
                {
                    dataSimulasi[j + 1] = dataSimulasi[j];
                    j = j - 1;
                }
                dataSimulasi[j + 1] = value;
            }
            return dataSimulasi
        }

        function searching(arr, key, teks){
            for (let i = 0; i < arr.length; i++){
                if (arr[i][key] == teks)
                    return i
            }
            return 'gagal'
        }
            
                

        

        $(function(){

            let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
            // let dataSimulasi = []
            $('#tblsimulasi tbody').html(showData(dataSimulasi))
            total()

            $('#formSimulasi').on('submit', function(e){
                e.preventDefault()
                insert()
                let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
                // console.log(dataSimulasi)
                $('#tblsimulasi tbody').html(showData(dataSimulasi))
                // console.log(dataSimulasi)
                total()
                
                
            })

            $('#sorting').on('click', function(){
                let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
                dataSimulasi = InsertionSort(dataSimulasi, 'id_karyawan')
                // console.log(dataSimulasi)
                // console.log('sort')
                $('#tblsimulasi tbody').html(showData(dataSimulasi))
                // console.log(dataBuku)
            })

            $('#btnSearch').on('click', function(e) {
                let teksSearch = $('#search').val()
                let id = searching(dataSimulasi, 'id_karyawan', teksSearch)
                let data = []
                if (id >= 0)
                data.push(dataSimulasi[id])
                // console.log(id)
                // console.log(data)
                $('#tblsimulasi tbody').html(showData(data))
            })



        })
    </script>
@endpush