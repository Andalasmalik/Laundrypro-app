<?php

namespace App\Exports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaketExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Paket::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Outlet Id',
            'jenis',
            'Nama Paket',
            'Harga'
        ];
    }
}
