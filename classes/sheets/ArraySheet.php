<?php

namespace Winter\Excel\Classes\Sheets;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Exports an array as a sheet, the first row of data will be styled as a header
 */
class ArraySheet extends BaseSheet implements FromCollection, WithStyles
{
    /**
     * The data of the sheet
     */
    protected array $data = [];

    public function __construct(
        string $title,
        array $data
    ) {
        $this->title = $title;
        $this->data = $data;
    }

    /**
     * Get the sheet's data as a collection
     */
    public function collection(): Collection
    {
        return collect($this->data);
    }

    /**
     * Style the spreadsheet
     * @see https://docs.laravel-excel.com/3.1/exports/column-formatting.html#styling
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1  => ['font' => ['bold' => true]],
        ];
    }
}
