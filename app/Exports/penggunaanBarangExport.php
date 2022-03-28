<?php

namespace App\Exports;

use App\Models\penggunaanBarang;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class penggunaanBarangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return penggunaanBarang::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama Barang',
            'Qty',
            'Harga',
            'Waktu Beli',
            'Supplier',
            'Status',
            'Waktu Update'
        ];
    }
}
