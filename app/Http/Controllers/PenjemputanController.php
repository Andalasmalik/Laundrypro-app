<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use App\Models\Member;
use App\Exports\PenjemputanExport;
use App\Imports\PenjemputanImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penjemputan.index', [
            'penjemputan'=>Penjemputan::all(),
            'member'=>Member::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request ->validate([
            'member_id' => 'required',
            'penjemput'=> 'required',
            'status'=> 'required'
            ]);
            
           $input = Penjemputan::create($validated);
    
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Penjemputan)
    {
        return view('penjemputan.index', [
            'penjemputans'=> $Penjemputan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request ->validate([
            // 'member_id'=>'required',
            'penjemput'=> 'required',
            'status'=> 'required'
            ]);

            $input = Penjemputan::where('id', $id)
                    ->update($validated);
                    
            if($input) return redirect('penjemputan')->with('succes', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjemputan::destroy($id);

        return redirect('/penjemputan')->with('succes', 'Data berhasil dihapus');
    }

    public function status(request $request ){
        $data = Penjemputan::where('id',$request->id)->first();
        $data->status = $request->status;
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }

    public function exportData(){

        return Excel::download(new PenjemputanExport, 'Data Kurir.xlsx');

    }

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
		Excel::import(new PenjemputanImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/penjemputan')->with('succes', 'Data berhasil diimport');
	}
}
