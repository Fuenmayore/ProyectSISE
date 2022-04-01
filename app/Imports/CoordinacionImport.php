<?php

namespace App\Imports;

use App\Models\Coordinacion;
use Maatwebsite\Excel\Concerns\ToModel;use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoordinacionImport implements ToModel,  WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Coordinacion([
            'id' =>$row['id_coordinacion'],
            'nom_coor' => $row['nombre_responsable'], //b
            'centro_id' => $row['codigo_centro'], //c
        ]);
    }

    public function batchSize(): int
    {
        return 6000;
    }
    public function chunkSize(): int
    {

        return 6000;
    }
}
