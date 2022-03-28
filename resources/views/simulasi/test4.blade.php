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
                        <label for="exampleFormControlInput1">Nama Barang</label>
                        <select class="form-control nama" id="jenis" placeholder="Isi" name="jenis" required>
                            <option name="jenis" value="Detergen">Detergen</option>
                            <option name="jenis" value="Pewangi">Pewangi</option>
                            <option name="jenis" value="Detergent Sepatu">Detergent Sepatu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" value="" min="0" name="jumlah" required >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Beli</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Harga Barang</label>
                        <input type="number" readonly class="form-control" id="harga_barang" value=""  name="harga_barang" required >
                    </div>
                    <div class="form-group">
                        <label for="jp" class=" col-form-label">Jenis Pembayaran</label>
                        <div class="form-check ">
                            <input type="radio" class="form-check-info" name="jp" id="jp" value="Cash">
                            <label class="form-check-info">Cash</label>
                        </div>
                        <div class="form-check ">
                            <input type="radio" class="form-check-info" name="jp" id="jp" value="e-money">
                            <label class="form-check-info">E-money/Transfer</label>
                        </div>
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
                    <div class="col-sm-2">
                        <input id="checkc" type="checkbox" class="me" checked  value="cash">
                        <label for="checkbox">Chas</label>
                        <input id="checkt" type="checkbox" class="me" checked value="transfer">
                        <label for="checkbox">Transfer</label>
                    </div>
                    <button class="btn btn-outline-danger" type="button" id="btnSearch">Cari</button>
                <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3" name="search" id="search">
              </div>
            <table class="table table-compact table-stripped table-bordered " id="tblsimulasi" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal Beli</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Diskon</th>
                        <th>Total Harga</th>
                        <th>Jenis Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="12" align="center">Belum Ada Data</td>
                    </tr>
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <td width="" colspan="3" align="center"  >Total</td>
                        <td id="total1">1</td>
                        <td id="total2">2</td>
                        <td id="total3">3</td>
                        <td id="total3" colspan="2">4</td>
                    </tr>
                </tfoot> --}}
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
            let value = (name === 'id_karyawan' ||
                         name === 'jumlah'
                        ? Number(item['value']):item['value'])
            newData[name] = value
        })
        // console.log(newData)
        dataSimulasi.push(newData);
        localStorage.setItem('dataSimulasi', JSON.stringify(dataSimulasi))
        }

        // function untuk menampilkan data dari localStorage
        function showData(dataSimulasi){
            const dc = 0.15
            var diskon = 0
            var jumlah = 0

            var totalharga = 0
            var totaljumlah = 0
            var totaldiskon = 0
            var total = 0


        let row = ''
        if(dataSimulasi.length == 0){
            return row = '<tr><td colspan="12" align="center">Belum Ada Data</td></tr>'
        }
        
        dataSimulasi.forEach(function(item, index){
                let harga = Number(item['harga_barang'])
                let qty = Number(item['jumlah'])

                // mencari total jumlah barang
                jumlah = harga*qty

                // mencari diskon
                if (jumlah >= 50000) {
                    diskon = jumlah*dc
                    jumlah = jumlah - diskon
                }

            row += `<tr>`
            row += `<td>${item['id_karyawan']}</td>`
            row += `<td>${item['date']}</td>`
            row += `<td>${item['jenis']}</td>`
            row += `<td>${item['harga_barang']}</td>`
            row += `<td>${item['jumlah']}</td>`
            row += `<td>${diskon}</td>`
            row += `<td>${jumlah}</td>`
            row += `<td>${item['jp']}</td>`
            row += `</tr>`

            
                // mencari total
                totalharga      += Number(item['harga_barang'])
                totaljumlah     += Number(item['jumlah'])
                totaldiskon     += diskon
                total           += jumlah

       
        })
            row += `<tr>`
            row += `<td width="" colspan="3" align="center"  >Total</td>`
            row += `<td>${totalharga}</td>`
            row += `<td>${totaljumlah}</td>`
            row += `<td>${totaldiskon}</td>`
            row += `<td colspan="2">${total}</td>`
            row += `</tr>`
               
        
        // $('#total1').val(totalharga)
        return row   
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


        function total(){

        }

        function harga() {
            let jenis = $('#jenis').val()
            let harga = $('#harga_barang').val()
            let Detergen = 15000
            let Pewangi = 10000
            let Sepatu = 25000  

            

            if(jenis =='Detergen'){
                $('#harga_barang').val(Detergen)
            }else if(jenis == 'Pewangi'){
                $('#harga_barang').val(Pewangi)
            }else if(jenis == 'Detergent Sepatu'){
                $('#harga_barang').val(Sepatu)
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
                dataSimulasi = InsertionSort(dataSimulasi, 'id_karyawan')
                $('#tblsimulasi tbody').html(showData(dataSimulasi))
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
@endsection