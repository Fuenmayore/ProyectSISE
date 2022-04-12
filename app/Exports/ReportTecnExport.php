<?php

namespace App\Exports;

use App\Models\Ficha;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportTecnExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ficha::selectRaw('id, id_coor, nivel, total_apre, total_act, fecha_in, fecha_fin, (total_apre - total_act) as desertados, (total_apre - total_act) as desertados, (round((total_act * 100) / (total_apre))) AS totalRetencion, round(100-((total_act * 100) / total_apre)) AS totalDersercion')
        ->where('nivel', 'tecnologo')
        ->having('desertados', '>=', 1)
        ->orderByDesc('desertados')
        ->get();
    }
}
