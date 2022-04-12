<?php

namespace App\Exports;

use App\Models\Ficha;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportCEExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ficha::selectRaw('id, id_coor, nivel,  total_apre, total_act, fecha_in,fecha_fin, (total_apre - total_act) as desertados, (((total_act * 100) / (total_apre))) AS totalRetencion, (100-((total_act * 100) / total_apre)) AS totalDersercion' )
        ->where('nivel', 'curso especial')
        ->having('desertados', '>=', 1)
        ->orderByDesc('desertados')
        ->get();

    }
}
