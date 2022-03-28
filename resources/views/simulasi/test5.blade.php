@extends('gentelella')
@section('content')

    <div class="card-body">
        <form id="formSimulasi">
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">No Transaksi</label>
                        <input type="text" class="form-control" id="no_transaksi" placeholder="Isi" name="no_transaksi" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">No. HP/WA</label>
                        <input type="number" class="form-control" id="tlp" value="" min="0" name="tlp" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Cucian</label>
                        <select class="form-control nama" id="jenis" placeholder="Isi" name="jenis" required>
                            <option name="jenis" value="Standar">Standar</option>
                            <option name="jenis" value="Express">Express</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="exampleFormControlInput1">harga</label>
                        <input type="number" readonly class="form-control" id="harga"  name="harga" required >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Pelanggan</label>
                        <input type="text"  class="form-control" id="nama" value=""  name="nama" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Cuci</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Berat</label>
                        <input type="number"  class="form-control" id="berat" value=""  name="berat" required >
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
            <h3 class="cardT-title" align="center" >Simulasi Data</h3>
        </div>


        
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend" id="button-addon3">
                    <button class="btn btn-success" type="button" id="sorting"> Sorting</button>
                   
                </div>
                    
                    <button class="btn btn-outline-danger" type="button" id="btnSearch">Cari</button>
                <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3" name="search" id="search">
              </div>
            <table class="table table-compact table-stripped table-bordered " id="tblsimulasi" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Kontak</th>
                        <th>Tanggal Cuci</th>
                        <th>Jenis Cucian</th>
                        <th>Berat</th>
                        <th>Diskon</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="12" align="center">Belum Ada Data</td>
                    </tr>
                </tbody>
                <tfoot>
                    {{-- <tr>
                        <td width="" colspan="5" align="center"  >Total</td>
                        <td id="total1">1</td>
                        <td id="total2">2</td>
                        <td id="total3">3</td>
                    </tr> --}}
                </tfoot>
            </table>
        </div>
    </div>



@push('script')
<script>
    let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
    $('#tblsimulasi tbody').html(showData(dataSimulasi))

    // methods
    // function untuk mengInput data ke localStorage
    function insert(){
            const form = $('#formSimulasi').serializeArray()
            let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
            let newData = {}
            form.forEach(function(item, index){
            let name = item['name']
            let value = (name === 'no_transaksi' ||
                         name === 'tlp'
                        ? Number(item['value']):item['value'])
            newData[name] = value
        })
        // console.log(newData)
        dataSimulasi.push(newData);
        localStorage.setItem('dataSimulasi', JSON.stringify(dataSimulasi))
        }

        // function untuk menampilkan data dari localStorage
        function showData(dataSimulasi){
            const dc = 0.1
            var diskon = 0
            var jumlah = 0

            var totaljumlah = 0
            var totalberat = 0
            var totaldiskon = 0
            total = 0


        let row = ''
        if(dataSimulasi.length == 0){
            return row = '<tr><td colspan="12" align="center">Belum Ada Data</td></tr>'
        }
        
        dataSimulasi.forEach(function(item, index){
                let harga = Number(item['harga'])
                let berat = Number(item['berat'])

                // mencari total jumlah barang
                jumlah = harga*berat

                // mencari diskon
                if (jumlah >= 50000) {
                    diskon = jumlah*dc
                    jumlah = jumlah - diskon
                }

                 

            row += `<tr>`
            row += `<td>${item['no_transaksi']}</td>`
            row += `<td>${item['nama']}</td>`
            row += `<td>${item['tlp']}</td>`
            row += `<td>${item['date']}</td>`
            row += `<td>${item['jenis']}</td>`
            row += `<td>${item['berat']}</td>`
            // row += `<td>${item['harga']}</td>`
            row += `<td>${diskon}</td>`
            row += `<td>${jumlah}</td>`
            row += `</tr>`

            
                // mencari total
                totalberat      += Number(item['berat'])
                totaldiskon     += diskon
                total           += jumlah

       
        })
            row += `<tr>`
            row += `<td width="" colspan="5" align="center"  >Total</td>`
            row += `<td>${totalberat}</td>`
            row += `<td>${totaldiskon}</td>`
            row += `<td >${total}</td>`
            row += `</tr>`
               
        
        // $('#total1').val(totaljumlah)
        return row   
        }

        function InsertionSort(dataSimulasi, key){
            let i, j, no_transaksi, value;
            for(i = 1; i < dataSimulasi.length; i++)
            {
                value = dataSimulasi[i];
                no_transaksi = dataSimulasi[i][key]
                j = i - 1;
                while (j >= 0 && dataSimulasi[j][key] > no_transaksi)
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


        function total(){

        }

        function harga() {
            let jenis = $('#jenis').val()
            let harga = $('#harga').val()
            let Standar = 7500
            let Express = 10000  

            

            if(jenis =='Standar'){
                $('#harga').val(Standar)
            }else if(jenis == 'Express'){
                $('#harga').val(Express)
            }
        }




        $(function(){

            let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
            // let dataSimulasi = []
            $('#tblsimulasi tbody').html(showData(dataSimulasi))
            // total()

            // event untuk trigger submit 
            $('#formSimulasi').on('submit', function(e){
                e.preventDefault()
                insert()
                let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []                
                $('#tblsimulasi tbody').html(showData(dataSimulasi))
                
                
            })
            // event untuk harga barang
            $('#formSimulasi').on('change', '.nama', function(){
                harga(this)
            })

            $('#sorting').on('click', function(){
                let dataSimulasi = JSON.parse(localStorage.getItem('dataSimulasi')) || []
                dataSimulasi = InsertionSort(dataSimulasi, 'no_transaksi')
                $('#tblsimulasi tbody').html(showData(dataSimulasi))
            })

            $('#btnSearch').on('click', function(e) {
                let teksSearch = $('#search').val()
                let id = searching(dataSimulasi, 'no_transaksi', teksSearch)
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
@endsection