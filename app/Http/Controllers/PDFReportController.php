<?php

namespace App\Http\Controllers;

use App\Models\Infaq;
use App\Models\Zakat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFReportController extends Controller
{
    public function print($cetak)
    {
        $datas = '';
        $jumlahP1 = '';
        $jumlahP2 = '';

        if ($cetak == 'infaq') {
            $datas = Infaq::all();
            $jumlahP1 = Infaq::where('type', 'pemasukan')->pluck('jumlah')->toArray();
            $jumlahP2 = Infaq::where('type', 'pengeluaran')->pluck('jumlah')->toArray();
        }  elseif ($cetak == 'zakat') {
            $datas = Zakat::all();
            $jumlahP1 = Zakat::where('type', 'pemasukan')->pluck('jumlah')->toArray();
            $jumlahP2 = Zakat::where('type', 'pengeluaran')->pluck('jumlah')->toArray();
        } else {
            abort(404);
        }

        // return view('cetak.pdfreport',[
        //     'datas' => $datas,
        //     'cetak' => $cetak,
        //     'jumlahP1' => $jumlahP1,
        //     'jumlahP2' => $jumlahP2,
        // ]);

    	$pdf = Pdf::loadview('cetak.pdfreport',[
            'datas' => $datas,
            'cetak' => $cetak,
            'jumlahP1' => $jumlahP1,
            'jumlahP2' => $jumlahP2,
        ]);
    	return $pdf->download('laporan-'. $cetak .'-pdf-' . date('d-M-yyyy'));
    }
}
