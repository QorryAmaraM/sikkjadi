<?php

namespace App\Charts;

use App\Models\penilaian_ckpr;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class grafikpenilaianckp
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $userid = Auth::user()->id;

        $dataAkhir = array();

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
            ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
            ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
            ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
            ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
            ->select('ckpts.*', 'ckprs.*', 'monitoring_ckps.*', 'penilaian_ckprs.*')
            ->where('ckpts.user_id', $userid)
            ->get();

            // dd($result);

        foreach ($result as $item) {
            // Menggunakan kombinasi tahun dan bulan sebagai kunci
            $key = $item->tahun . ' - ' . $item->bulan;

            // Menambahkan ke array $dataAkhir
            $dataAkhir[$key] = $item->ckp_akhir;
        }

        // Call the static method
        $dataAkhir = self::compareDates($dataAkhir);

        // dd($dataAkhir);

        $tahun = array_keys($dataAkhir);
        $nilai = array_values($dataAkhir);

        return $this->chart->barChart()
            ->addData('Nilai Akhir', $nilai)
            ->setHeight(400)
            ->setXAxis($tahun);
    }

    // Define compareDates as a static method
    protected static function compareDates($dataAkhir)
    {
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        uksort($dataAkhir, function ($a, $b) use ($months) {
            $dateA = explode('-', $a);
            $dateB = explode('-', $b);

            // Membandingkan tahun
            $yearComparison = strcmp($dateA[0], $dateB[0]);

            if ($yearComparison === 0) {
                // Jika tahun sama, bandingkan bulan berdasarkan urutan dalam array $months
                $monthA = array_search(strtolower($dateA[1]), $months);
                $monthB = array_search(strtolower($dateB[1]), $months);

                return $monthA - $monthB;
            }

            return $yearComparison;
        });

        return $dataAkhir;
    }
}
