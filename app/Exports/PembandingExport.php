<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembandingExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($item) {
            return [
                'ID' => $item['ID'] ?? $item->id,
                'Nama Pembanding' => $item['Nama Pembanding'] ?? $item->nama_pembanding,
                'Alamat' => $item['Alamat'] ?? $item->alamat,
                'Jenis Aset' => $item['Jenis Aset'] ?? $item->jenis_aset,
                'Narasumber' => $item['Narasumber'] ?? $item->nama_narsum,
                'Telepon' => $item['Telepon'] ?? $item->telepon,
                'Sumber Data' => $item['Sumber Data'] ?? $this->mapSumber($item->sumber),
                'Tanggal Input' => $item['Tanggal Input'] ?? $item->created_at,
                'Status Data' => $item['Status Data'] ?? ($item->status_data_pembanding ? 'Aktif' : 'Non-Aktif')
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA PEMBANDING',
            'ALAMAT',
            'JENIS ASET',
            'NARASUMBER',
            'TELEPON',
            'SUMBER DATA',
            'TANGGAL INPUT',
            'STATUS DATA'
        ];
    }

    private function mapSumber($sumber)
    {
        $map = [
            'tanah_kosong' => 'Tanah Kosong',
            'pembanding_retail' => 'Pembanding Retail',
            'pembanding_bangunan' => 'Pembanding Bangunan'
        ];

        return $map[$sumber] ?? $sumber;
    }
}
