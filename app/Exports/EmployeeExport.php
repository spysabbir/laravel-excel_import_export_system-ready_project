<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EmployeeExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function query()
    {
        return User::query()->select('name', 'email', 'created_at');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Created At',
        ];
    }

    public function map($row): array
    {
        return [
            $row->name,
            $row->email,
            $row->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
