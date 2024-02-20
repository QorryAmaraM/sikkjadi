<?php

namespace App\Charts;

use App\Models\penilaian_skp;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class grafikpenilaianskp
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        
        $userid = Auth::user()->id;

        $nilai_akhir = penilaian_skp::join('rencana_kinerjas', 'rencanakinerja_id', '=', 'rencana_kinerjas.id')
            ->join('skp_tahunans', 'skp_tahunan_id', '=', 'skp_tahunans.id')
            ->select('user_id','tahun', 'nilai_tertimbang')
            ->where('user_id', $userid)
            ->get();

            // dd($nilai_akhir);

        $nilai_dikelompokkan = collect($nilai_akhir)->groupBy('tahun');

        $hasil_jumlah = $nilai_dikelompokkan->map(function ($tahun) {
            return $tahun->sum('nilai_tertimbang');
        });

        $hasil_rata_rata = $hasil_jumlah->map(function ($totalNilai, $tahun) use ($nilai_dikelompokkan) {
            $jumlahData = $nilai_dikelompokkan[$tahun]->count();
            return $jumlahData > 0 ? $totalNilai / $jumlahData : 0;
        });

        $hasil_rata_rata = $hasil_rata_rata->sortBy(function ($nilai, $tahun) {
            return $tahun;
        });

        $hasil_rata_rata = $hasil_rata_rata->slice(-12);

        $tahun_array = $hasil_rata_rata->keys()->all();
        $nilai_rata_rata_array = $hasil_rata_rata->values()->all();

        // dd($hasil_rata_rata);

        return $this->chart->barChart()
            ->addData('Nilai SKP',  $nilai_rata_rata_array)
            ->setXAxis($tahun_array);
    }
}
