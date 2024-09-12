<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\TipoReporte;
use Illuminate\Support\Facades\DB;
use \PhpOffice\PhpSpreadsheet\Style\Alignment;
use \PhpOffice\PhpSpreadsheet\Style\Fill;

class TipoReporteExport implements FromArray, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $query = null;
    protected $header = array();
    protected $headerStyle = null;

    public function __construct($query, $header)
    {
        //$this->super();
        $this->query = $query;
        $this->header = $header;
        $this->headerStyle = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => '003F8A']
            ],
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFCC00']
            ],
        ];
    }

    public function array(): array
    {

        $result = DB::select($this->query);

        return $result;
    }


    public function headings(): array
    {
        return $this->header;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $sheet = $event->getDelegate();
                $cellRange = 'A1:' . $sheet->getHighestColumn() . '1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($this->headerStyle);
                $event->sheet->setAutoFilter($cellRange);
            },
        ];
    }
}
