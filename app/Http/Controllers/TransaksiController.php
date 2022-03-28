<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Paket;
use App\Models\Outlet;
use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index', [
            'tb_paket'=>Paket::all(),
            'tb_member'=>Member::all(),
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
        //   $d = Transaksi::orderBy('id', 'desc')->first();
        // $urutan = ($d == null?1:substr($d->kode_invoice,5,6)+1);

        // $kode_invoice = sprintf('GL' .date('Y') .'%05d' ,$urutan); 

        // dd($kode_invoice);
        $validate = $request->validate([
            'outlet_id' => 'required',
            'member_id' => 'required',
            'paket_id' => 'required',
            'tgl' => 'required|date',
            'tgl_bayar' => 'nullable',
            'batas_waktu' => 'nullable|date',
            'diskon' => 'nullable',
            'pajak' => 'nullable',
            'biaya_tambahan' => 'nullable',
            'status' => 'required',
            'dibayar' => 'nullable',
            'keterangan' => 'nullable',
            'qty' => 'required',
            'total' => 'required',
            'sub_total' => 'required',
        ]);
        $validate['user_id'] = Auth::id();
        $validate['kode_invoice'] = Transaksi::createInvoice();

        // dd($validate);
        $input_transkasi =  Transaksi::create($validate);

        $paket_id = $request->paket_id;
        $qty = $request->qty;
        $sub_total = $request->sub_total;
        $keterangan = $request->keterangan;
        // $sub_total = $harga*$qty;
        // $sub_total = $request->sub_total;

        foreach($paket_id as $i => $v){
           $validate['transaksi_id'] = $input_transkasi->id;
           $validate['paket_id'] = $paket_id[$i];
           $validate['qty'] = $qty[$i];
           $validate['sub_total'] = $sub_total[$i];
           $validate['keterangan'] = $keterangan[$i];
        //    $sub_total = $sub_total[$i];
            
           $input_detail_pembelian =  Detail_Transaksi::create($validate);

            return redirect('/transaksi/faktur/'.$input_transkasi->id);

        //    dd($validate);
         }
        //  if($validate['status'] != 'dibayar'){
        //      return redirect('/transaksi/faktur/'.$input_transkasi->id);
        //  }else{
        //     return redirect('/transaksi')->with('succes', 'Transaksi Berhasil');
        //  }
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function faktur(Transaksi $transaksi, $id)
    {
        $data = array(
            'transaksi' => Transaksi::find($id)

        );
        $transaksi -> load(['member','DetailTransaksi']);
        return view('transaksi.faktur')->with($data);
    }
}
