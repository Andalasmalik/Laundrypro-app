<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Exports\OutletExport;
use App\Imports\OutletImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
// use Barryvdh\DomPDF\PDF;
use PDF;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outlet.index', [
            'tb_outlet'=>Outlet::all()
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
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
            ]);
        
           $input = Outlet::create($validated);
    
          if($input) return redirect('outlet')->with('succes', 'Data berhasil diinput');
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
    public function edit($Outlet)
    {
        return view('outlet.index', [
            'tb_outlet'=> $Outlet
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
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
            ]);

            $input = Outlet::where('id', $id)
                    ->update($validated);
                    
            if($input) return redirect('outlet')->with('succes', 'Data berhasil diinput');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Outlet)
    {
        Outlet::destroy($Outlet);

        return redirect('/outlet')->with('succes', 'Data berhasil dihapus');
    }

    public function exportData(){

        return Excel::download(new OutletExport, 'Outlet.xlsx');

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
		Excel::import(new OutletImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/outlet')->with('succes', 'Data berhasil diimport');
	}

    public function exportPDF(Outlet $outlet) {
       
        // $outlet = ;
  
        $pdf = PDF::loadView('outlet.pdf', [
            'tb_outlet' => Outlet::all()
        ]);
        
        return $pdf->stream();
        
      }
}
