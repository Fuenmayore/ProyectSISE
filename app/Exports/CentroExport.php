<?php

namespace App\Exports;

use App\Models\Centro;
use Maatwebsite\Excel\Concerns\FromCollection;

class CentroExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Centro::all();
    }
}
