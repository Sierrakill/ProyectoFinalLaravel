<?php

namespace App\Exports;

use App\Models\Prime;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrimeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prime::all();
    }
}
