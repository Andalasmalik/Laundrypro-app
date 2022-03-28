<?php

namespace App\Imports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaketImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Paket([
            'outlet_id' => Auth()->user()->outlet_id,
            'jenis' => $row['jenis'],
            'nama_paket' => $row['nama_paket'],
            'harga' => $row['harga']
        ]);
    }
}
