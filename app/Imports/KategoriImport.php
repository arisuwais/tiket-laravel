<?php

namespace App\Imports;

use App\kategori;
use Maatwebsite\Excel\Concerns\ToModel;

class KategoriImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new kategori([
            'nama_kategori' => $row[0]
        ]);
    }
}
