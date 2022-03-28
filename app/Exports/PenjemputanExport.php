<?php

namespace App\Exports;

use App\Models\Penjemputan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PenjemputanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    Public function map($penjemputan): array
    {
        return[
            $penjemputan->id,
            $penjemputan->member_id,
            $penjemputan->member->nama,
            $penjemputan->member->alamat,
            $penjemputan->member->tlp,
            $penjemputan->penjemput,
            $penjemputan->status,
        ];
    }
    public function collection()
    {
        return Penjemputan::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'member_id',
            'Member',
            'Alamat ',
            'tlp',
            'Penjemput',
            'Status'
        ];
    }
}
