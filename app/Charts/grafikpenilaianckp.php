<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\penilaian_ckpr;

class grafikpenilaianckp
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dataAkhir = array();

        $result = penilaian_ckpr::join('ckprs', 'ckpr_id', '=', 'ckprs.id')
        ->join('ckpts', 'ckpt_id', '=', 'ckpts.id')
        ->join('entri_angka_kredits', 'angka_kredit_id', '=', 'entri_angka_kredits.id')
        ->join('list_uraian_kegiatans', 'uraian_kegiatan_id', '=', 'list_uraian_kegiatans.id')
        ->leftjoin('monitoring_ckps', 'monitoring_ckps.penilaian_ckpr_id', '=', 'penilaian_ckprs.id')
        ->select('ckpts.*', 'ckprs.*', 'monitoring_ckps.*', 'penilaian_ckprs.*' )
        ->get();

        foreach ($result as $item) {
            $dataAkhir[$item->tahun] = $item->ckp_akhir;
        }

        asort($dataAkhir);

        $tahun = array_keys($dataAkhir);
        $nilai = array_values($dataAkhir);

        return $this->chart->barChart()
            ->addData('Nilai Akhir', $nilai)
            ->setHeight(400)
            ->setXAxis($tahun);
    }
}
