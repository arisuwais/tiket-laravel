<?php

namespace App\Exports;

use App\transaksi;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TransaksiExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    public function view(): view
    {
        return view('transaksi.report', ['transaksi' => transaksi::all()]);
    }
}
