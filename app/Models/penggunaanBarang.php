<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penggunaanBarang extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    public $incrementing = true;
    protected $table = 'penggunaan_barangs';
    protected $guarded = ['id','created_at','updated_at'];
}
