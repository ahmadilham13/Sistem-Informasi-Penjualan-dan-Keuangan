<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Interfaces\LaporanInterface;
use App\Interfaces\TransaksiInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends BaseController
{
    public function __construct(TransaksiInterface $transaksi, LaporanInterface $laporan)
    {
        parent::__construct($transaksi, $laporan);

        $this->setSortChoices([
            'created_at-asc' => 'Oldest',
            'created_at-desc' => 'Newest',
            'name-desc' => 'Z-A',
            'name-asc' => 'A-Z',
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        $this->setSearch($request);
        $this->setPagination($request);
        $this->setSort($request);

        $tanggal = $request->query('tanggal') ? $request->query('tanggal') : '';

        // $bulan = $this->generateBulanOptions($request->query('bulan'));
        $tahun = $this->generateTahunOptions($request->query('tahun'));

        $data = [];
        $quantity=0;
        $total=0;
        $resultKeuntungan=0;

        if($request->query('tahun')!=null) {
            if(empty($request->query('bulan'))) $bulan = null;
            $bulan = $request->query('bulan');
            $data = $this->laporan->GetAllLaporan($tanggal, $bulan, $tahun);

            // get pengeluaran
            $totalPengeluaran = $this->laporan->GetTotalPengeluaran($tanggal, $bulan, $tahun);

            foreach($data as $key => $value) {
                $quantity += $value['quantity'];
                $total += $value['product_bibit']['harga_jual'] * $value['quantity'];
            }

            $resultKeuntungan = $total - $totalPengeluaran;
        }

        return view('laporan.index', [
            'bulanOptions' => $this->generateBulanOptions(),
            'tahunOptions'  => $this->generateTahunOptions(),
            'data'          => $data,
            'quantity'      => $quantity,
            'total'         => $total,
            'resultsTotal'  => $resultKeuntungan,
            'dateSelect'    => $tanggal,
            'tahunSelect'   => $request->query('tahun') ? $request->query('tahun') : '',
            'bulanSelect'   => $request->query('bulan') ? $request->query('bulan') : null,
            'periode'       => $this->formatTanggal($tanggal, $request->query('bulan') ? $request->query('bulan') : null, $request->query('tahun') ? $this->generateTahunOptions($request->query('tahun')) : ''),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // private method
    private function generateBulanOptions($key=null)
    {
        $bulanOptions = ['' => 'Select Month'];

        for ($i = 1; $i <= 12; $i++) {
            $timestamp = mktime(0, 0, 0, $i, 1);
            $bulanOptions[$i] = date('F', $timestamp);
        }

        if($key != null) {
            return $bulanOptions[$key];
        } else {
            return $bulanOptions;            
        }
    }

    private function generateTahunOptions($key=null)
    {
        $startYear = 2000; // Tahun awal
        $endYear = now()->year; // Tahun sekarang

        $range = range($endYear, $startYear);

        if($key != null) {
            return $range[$key];
        } else {
            return $range;
        }
    }

    private function formatTanggal($hari = null, $bulan = null, $tahun = null) {
        $bulanArray = [
            'January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
    
        $result = '';
    
        // Cek jika ada input hari, bulan, dan tahun
        if (!empty($hari) && !empty($bulan) && !empty($tahun)) {
            $bulanString = $bulanArray[$bulan];
            $result = "$hari $bulanString $tahun";
        }
        // Jika hanya ada input bulan dan tahun
        elseif (!empty($bulan) && !empty($tahun)) {
            $bulanString = $bulanArray[$bulan - 1];
            $result = "$bulanString $tahun";
        }
        // Jika hanya ada input tahun
        elseif (!empty($tahun)) {
            $result = "$tahun";
        }
    
        return $result;
    }
}
