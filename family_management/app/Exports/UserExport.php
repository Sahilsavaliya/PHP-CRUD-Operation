<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UserExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'id',
            'name',
            'email',
            'image',
            'gender',
            'age',
            'services',
            'status', 
        ];
    } 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
