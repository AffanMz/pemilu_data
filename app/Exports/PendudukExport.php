<?php
namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendudukExport implements FromCollection, WithHeadings, WithMapping {
    /**
     * @return \Illuminate\Support\Collection
     */

     private $rowNumber = 0;

    public function collection()
    {
        return Penduduk::with(['desa.kelurahan.kecamatan'])
                        ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama Penduduk',
            'Kecamatan',
            'Kelurahan',
            'TPS',
            'Alamat',
            'Tanggal Lahir',
            'Jenis Kelamin',
        ];
    }

    /**
     * @param $penduduk
     * @return array
     */
    public function map($penduduk): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $penduduk->nik,
            $penduduk->name,
            $penduduk->desa->kelurahan->kecamatan->name,
            $penduduk->desa->kelurahan->name,
            $penduduk->desa->name,
            $penduduk->alamat,
            $penduduk->tl,
            $penduduk->jk,
        ];
    }
}
