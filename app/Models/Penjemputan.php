<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'penjemputan';
    protected $fillable = ['member_id', 'penjemput', 'status',];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

}


