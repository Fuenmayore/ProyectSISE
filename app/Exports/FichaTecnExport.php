<?php

namespace App\Exports;

use App\Models\Ficha;
use Maatwebsite\Excel\Concerns\FromCollection;

class FichaTecnExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ficha::selectRaw('id, estado, total_act, total_apre, nivel, fecha_in, fecha_fin, id_coor')
        ->where('nivel', 'tecnologo')
        ->get();
    }
}
