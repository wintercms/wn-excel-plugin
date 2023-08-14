<?php

namespace Winter\Excel\Examples\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Winter\Excel\Classes\Sheets\ArraySheet;
use Winter\Excel\Classes\Sheets\CoverSheet;

class BlogExport implements WithMultipleSheets
{
    use Exportable;

    /**
     * The time period currently being exported
     */
    protected array $period;

    /**
     * The data being exported
     */
    protected iterable $rows;

    public function __construct(array $period, iterable $rows)
    {
        $this->period = $period;
        $this->rows = $rows;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new CoverSheet('sheet', [
            'title' => 'Blog Posts',
            'period' => $this->period,
        ]);
        $sheets[] = new ArraySheet("Posts", (array) $this->rows);

        return $sheets;
    }
}
