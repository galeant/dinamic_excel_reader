<?php

namespace App\Helpers;

use Illuminate\Support\Str;


class ExcelReader
{
    public static function index($file)
    {
        $excel = [];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheet_count = $spreadsheet->getSheetCount();
        for ($i = 0; $i < $sheet_count; $i++) {
            $work_sheet = $spreadsheet->getSheet($i);
            $all_cell = $work_sheet->toArray(null, true, true, true);
            $title = $work_sheet->getTitle();
            $identifier = Str::slug($title, '_');
            $excel[$identifier] = [
                'title' => $title,
                'data' => $all_cell
            ];
        }
        return $excel;
    }
}
