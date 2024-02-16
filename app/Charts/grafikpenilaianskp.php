<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\penilaian_skp;

class grafikpenilaianskp
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $nilai_akhir = penilaian_skp::join('rencana_kinerjas', 'rencanakinerja_id', '=', 'rencana_kinerjas.id')
            ->join('skp_tahunans', 'skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('tahun', 'nilai_tertimbang')
            ->get();

        $nilai_dikelompokkan = collect($nilai_akhir)->groupBy('tahun');

        $hasil_jumlah = $nilai_dikelompokkan->map(function ($tahun) {
            return $tahun->sum('nilai_tertimbang');
        });

        $hasil_rata_rata = $hasil_jumlah->map(function ($totalNilai, $tahun) use ($nilai_dikelompokkan) {
            $jumlahData = $nilai_dikelompokkan[$tahun]->count();
            return $jumlahData > 0 ? $totalNilai / $jumlahData : 0;
        });

        $tahun_array = $hasil_rata_rata->keys()->all();
        $nilai_rata_rata_array = $hasil_rata_rata->values()->all();

        // dd($tahun_array);

        return $this->chart->barChart()
            ->addData('Nilai SKP',  $nilai_rata_rata_array)
            ->setXAxis($tahun_array);
    }
}
