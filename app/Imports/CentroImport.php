<?php

namespace App\Imports;

use App\Models\Centro;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CentroImport implements ToModel,  WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Centro([
            'id' => $row['codigo_centro'], //a
            'nom_centro' => $row['nombre_centro'], //b
        ]);
    }

    public function batchSize(): int
    {
        return 4000;
    }
    public function chunkSize(): int
    {

        return 4000;
    }
}
