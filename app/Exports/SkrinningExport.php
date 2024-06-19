<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class SkrinningExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $formattedData = [];
        foreach ($this->data as $username => $records) {
            foreach ($records as $record) {
                $formattedData[] = [
                    $record['id_skrin_user'],
                    $record['id_user'],
                    $record['username'],
                    $record['id_skrinning'],
                    $record['id_bag_skrin_user'],
                    $record['tgl_pengisian'],
                    $record['jenis_skrinning'],
                    $record['nama_bagian'],
                    $record['deskripsi_bagian'],
                    $record['jenis_hasil'],
                    $record['hasil'],
                    $record['poin_jawaban'],
                ];
            }
        }

        return new Collection($formattedData);
    }

    public function headings(): array
    {
        return [
            'ID Skrin User',
            'ID User',
            'Username',
            'ID Skrinning',
            'ID Bag Skrin User',
            'Tanggal Pengisian',
            'Jenis Skrinning',
            'Nama Bagian',
            'Deskripsi Bagian',
            'Jenis Hasil',
            'Hasil',
            'Poin Jawaban',
        ];
    }
}
