<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $guarded = ['id'];

 
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    /**
     * untuk merelasikan model member dengan model transaksi
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    /**
     * Untuk merelasikan model user dengan model transaksi
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Untuk merelasikan model Detail Transaksi dengan model Transaksi
     */
    public function DetailTransaksi()
    {
        return $this->hasMany(Detail_Transaksi::class);
    }
    
    // public function createInvoice(){
    //     $last = Transaksi::orderBy('id' , 'desc')->first();
    //     $last = ($last == null?1:$last->id + 1);
    //     $kode = printf('YMD' .date('Ymd').'%06d', $last);

    //     return $kode;
    // }
    public static function createInvoice()
    {
        $lastNumber = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_invoice`,9,5)),0) + 1 AS last_number")->whereRaw("SUBSTRING(`kode_invoice`,1,4) = '" . date('Y') . "'")->whereRaw("SUBSTRING(`kode_invoice`,5,2) = '" . date('m') . "'")->orderBy('last_number')->first()->last_number;
        $invoice =  date("Ymd") . sprintf("%'.05d", $lastNumber);
        return $invoice;
    } 

    public function getSubTotal()
    {
        $total = $this->DetailTransaksi->reduce( function($carry, $item) {
            return $carry + $item->paket->harga; 
        });
    }
}
