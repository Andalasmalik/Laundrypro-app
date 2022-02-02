<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'tb_outlet';
    protected $fillable = ['id', 'nama', 'alamat', 'tlp'];

}
