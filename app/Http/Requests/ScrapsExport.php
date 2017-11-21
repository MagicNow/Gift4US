<?php
namespace App\Http\Requests;

class ScrapsExport extends \Maatwebsite\Excel\Files\NewExcelFile {
    public function getFilename()
    {
        return 'recados';
    }
}