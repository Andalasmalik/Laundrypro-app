<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Exports\PaketExport;
use App\Imports\PaketImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PaketController extends Controller
{
    /**
     * untuk menampilkan view paket dan mengirim data paket dengan model
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('paket.index', [
            'tb_paket'=>Paket::all()
        ]);
    }

    /**
     * untuk menampilkan view create data
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store untuk menyimpan data ke database
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request ->validate([
            'outlet_id' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga'=> 'required'
            ]);
            
           $input = Paket::create($validated);
    
          if($input) return redirect('#')->with('succes', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Untuk menampilkan view edit  dan menampilkan data paket yang akan diupdate
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Paket)
    {
        return view('paket.index', [
            'tb_paket'=> $Paket
        ]);
    }

    /**
     * Update untuk proses update data paket
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request ->validate([
            'outlet_id' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
            ]);

            $input = Paket::where('id', $id)
                    ->update($validated);
                    
            if($input) return redirect('paket')->with('succes', 'Data berhasil diupdate');
    }

    /**
     * Untuk menghapus data paket sesuai ID
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paket::destroy($id);

        return redirect('/paket')->with('succes', 'Data berhasil dihapus');
    }
    
    // Untuk malakukan export data dari view database menjadi file excel

    public function exportData(){

        return Excel::download(new PaketExport, 'Paket.xlsx');

    }

    // Untuk melakukan upload data 

    public function importData(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new PaketImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/paket')->with('succes', 'Data berhasil diimport');
	}
}
