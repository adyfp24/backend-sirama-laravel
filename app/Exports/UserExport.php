<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class UserExport implements FromCollection, WithHeadings
{
    protected $users;

    public function __construct(array $users)
    {
        $this->users = collect($users);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->users->map(function ($user) {
            return [
                $user['username'],
                $user['email'],
                $user['role'],
                $user['created_at'],
                $user['updated_at'],
                $user['nama'],
                $user['no_hp'],
                $user['tgl_lahir'],
                $user['jenis_kelamin'],
                $user['sekolah'],
                $user['foto_profile'],
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Username',
            'Email',
            'Role',
            'Created At',
            'Updated At',
            'Nama',
            'No HP',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Sekolah',
            'Foto Profile',
        ];
    }
}
