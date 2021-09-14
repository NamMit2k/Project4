<?php

namespace App\Exports;

use App\Models\OrderModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportOrder implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrderModel::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'Mã hóa đơn',
            'Mã khách hàng',
            'Mã địa chỉ',
            'Mã thanh toán',
            'Tổng tiền'
        ];
    }
}
