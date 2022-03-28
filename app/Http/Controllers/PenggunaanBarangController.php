<?php

namespace App\Http\Controllers;

use App\Models\penggunaanBarang;
use Illuminate\Http\Request;
use App\Exports\penggunaanBarangExport;
use Maatwebsite\Excel\Facades\Excel;

class PenggunaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.index', [
            'penggunaan_barangs'=>penggunaanBarang::all()
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
        // dd($request);
        $validatedData = $request ->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga'=> 'required',
            'waktu_beli'=> 'required',
            'supplier'=> 'required',
            'status'=> 'required',
            'waktu_update'=> 'required'
            ]);
            
           $input = penggunaanBarang::create($validatedData);
    
          if($input) return redirect('/barang')->with('succes', 'Data berhasil diinput');
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
    public function edit(penggunaanBarang $penggunaan_barangs)
    {
        return view('barang.index', [
            'penggunaan_barangs'=> $penggunaan_barangs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,penggunaanBarang $p ,$id)
    {
        $validated = $request ->validate([
            'id' => 'required',
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga'=> 'required',
            'waktu_beli'=> 'required',
            'supplier'=> 'required',
            'status'=> 'required',
            'waktu_update'=> 'required'
            ]);

            $p = penggunaanBarang::find($id);
            
            $input = penggunaanBarang::where('id', $p->id)
            ->update($validated);
    
          if($input) return redirect('barang')->with('succes', 'Data berhasil diinput');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penggunaanBarang::destroy($id);

        return redirect('/barang')->with('succes', 'Data berhasil dihapus');
    }

    public function status(request $request ){
        $data = penggunaanBarang::where('id',$request->id)->first();
        $data->status = $request->status;
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }

    public function exportData(){

        return Excel::download(new penggunaanBarangExport, 'Data Barang.xlsx');

    }
}
