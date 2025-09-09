<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SalesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection

    */
    public function collection()
    {
        return Sale::with(['business', 'user'])
        ->get()
        ->map(function($sale) {
            return [
                'ID' => $sale->id,
                'Business' => $sale->business->name,
                'User' => $sale->user->name,
                'Sale Date' => $sale->sale_date,
                'Total Sales' => $sale->total_sales,
                'Cost' => $sale->cost,
                'Cost Description' => $sale->cost_description,
                'Cash Yesterday' => $sale->cash_mkononi_jana,
            ];
        });
    }
    public function headings(): array
    {
        return [
            'ID',
            'Business',
            'User',
            'Sale Date',
            'Total Sales',
            'Cost',
            'Cost Description',
            'Cash Yesterday',
        ];
    }
}
