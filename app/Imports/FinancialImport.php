<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithEvents;

class FinancialImport implements ToCollection, WithHeadingRow, WithEvents
{
    public $sheetName = [];
    public $sheetData = [];
    /**
     * @param Collection $collection
     */
    public function __construct()
    {
        $this->sheetName = [];
        $this->sheetData = [];
    }
    public function collection(Collection $collection)
    {
        $this->sheetData[] = $collection;
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $this->sheetName[] = $event->getSheet()->getTitle();
            }
        ];
    }
}
