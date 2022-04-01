<?php

namespace App\Exports;

use App\Models\Coordinacion;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoordinacionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Coordinacion::all();
    }
}
