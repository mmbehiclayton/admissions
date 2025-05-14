<?php

namespace App\Exports;

use App\Models\Learners;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ClassTransportList implements FromView, WithTitle, WithStyles
{
    protected $stream;

    public function __construct($stream)
    {
        $this->stream = $stream;
    }

    public function view(): View
    {
        $learners = Learners::with(['bus', 'streams.classes'])
            ->where('stream_id', $this->stream->id)
            ->where('status', 'active')
            ->get();

        return view('exports.transport', [
            'learners' => $learners,
            'stream' => $this->stream,
        ]);
    }

    public function title(): string
    {
        return $this->stream->classes->name . ' ' . $this->stream->name . ' Transport';
    }

    public function styles(Worksheet $sheet)
    {
        // Apply styling to the header row
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => 'center'],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'E0E0E0'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Optionally, auto-size columns
        foreach (range('A', 'J') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [];
    }
}
