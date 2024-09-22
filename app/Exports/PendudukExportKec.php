<?php

namespace App\Exports;

use App\Models\Penduduk;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PendudukExportKec
{
    private $spreadsheet;
    private $sheet;
    private $rowNumber = 1;
    public $data;

    public function __construct()
    {
        // Membuat instance Spreadsheet baru
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
    }

    public function export($kec)
    {
        // Set judul kolom (headings)
        $this->headings();

        $this->data = $kec;

        // Ambil data penduduk dari database
        $penduduks = Penduduk::with(['desa.kelurahan.kecamatan'])->get();

        // Map data penduduk ke file Excel
        foreach ($penduduks as $penduduk) {
            $this->rowNumber++;
            $this->map($penduduk);
        }

        // Menyimpan file Excel
        $writer = new Xlsx($this->spreadsheet);
        $fileName = 'penduduk_export_kec.xlsx';
        $writer->save($fileName);

        return $fileName; // Mengembalikan nama file untuk diunduh atau diproses lebih lanjut
    }

    private function headings()
    {
        $this->sheet->setCellValue('A1', 'No');
        $this->sheet->setCellValue('B1', 'NIK');
        $this->sheet->setCellValue('C1', 'Nama Penduduk');
        $this->sheet->setCellValue('D1', 'Kecamatan');
        $this->sheet->setCellValue('E1', 'Kelurahan');
        $this->sheet->setCellValue('F1', 'TPS');
        $this->sheet->setCellValue('G1', 'Alamat');
        $this->sheet->setCellValue('H1', 'Tanggal Lahir');
        $this->sheet->setCellValue('I1', 'Jenis Kelamin');

        // Set alignment center pada header
        $this->sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    private function map($penduduk)
    {
        if ($penduduk->desa->kelurahan->kecamatan->id != $this->data) {
            $this->rowNumber--;
            return; // Skip this penduduk if the condition is not met
        }
        // Mengisi data penduduk ke dalam baris
        $this->sheet->setCellValue('A' . $this->rowNumber, $this->rowNumber - 1);
        $this->sheet->setCellValue('B' . $this->rowNumber, $penduduk->nik);
        $this->sheet->setCellValue('C' . $this->rowNumber, $penduduk->name);
        $this->sheet->setCellValue('D' . $this->rowNumber, $penduduk->desa->kelurahan->kecamatan->name);
        $this->sheet->setCellValue('E' . $this->rowNumber, $penduduk->desa->kelurahan->name);
        $this->sheet->setCellValue('F' . $this->rowNumber, $penduduk->desa->name);
        $this->sheet->setCellValue('G' . $this->rowNumber, $penduduk->alamat);
        $this->sheet->setCellValue('H' . $this->rowNumber, $penduduk->tl); // Tanggal Lahir
        $this->sheet->setCellValue('I' . $this->rowNumber, $penduduk->jk); // Jenis Kelamin
    }
}
