<?php

namespace Winter\Excel\Classes\Sheets;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CoverSheet extends PartialSheet implements WithEvents
{
    protected string $title = 'Index';

    /**
     * Registers the event listeners for this sheet's generation
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A2:A7')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
                $event->sheet->getStyle('A9')->applyFromArray([
                    'font' => [
                        'italic' => true,
                    ],
                ]);
            },
        ];
    }
}
