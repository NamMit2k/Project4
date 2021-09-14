<?php

namespace App\Exports;

use App\Models\CategoryModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CategoryModel::all();
    }
}
