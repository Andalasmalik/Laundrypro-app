<?php

namespace App\Exports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OutletExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Outlet::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama Outlet',
            'Alamat',
            'No telp',
            'created_at',
            'updated_at'
        ];
    }

    public function registerEvent(){
        
        return ([
            
        ]);
    }
}
