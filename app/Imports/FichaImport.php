<?php

namespace App\Imports;

use App\Models\Coordinacion;
use App\Models\Ficha;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FichaImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{

    private $coordinacions;
    public function  __construct(){
        $this->coordinacions = Coordinacion::pluck('id', 'nom_coor');
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Ficha([

            'id' => $row['identificador_ficha'],
            'estado' => $row['estado_curso'], //b
            'total_apre' => $row['total_aprendices'], //c
            'total_act' => $row['total_aprendices_activos'], //d
            'nivel' => $row['nivel_formacion'], //e

            'fecha_in' => $row['fecha_inicio_ficha'], //g
            'fecha_fin' => $row['fecha_terminacion_ficha'], //h
            'id_coor' =>  $this->coordinacions[$row['nombre_responsable']]

        ]);

    }

    public function batchSize(): int
    {
        return 10000;
    }
    public function chunkSize(): int
    {


        return 10000;


        return 4000;

    }

}

