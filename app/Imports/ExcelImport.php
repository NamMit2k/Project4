<?php

namespace App\Imports;

use App\Models\CategoryModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CategoryModel([
             'category_name'=>$row[0],
            'category_desc'=>$row[1],
            'category_parent'=>$row[2],
            'category_status'=>$row[3],
        ]);
    }
}
