<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AppBaseController;
use Flash;
use Response;
use PDF;
use Charts;
use App\Models\users;
use App\Models\pembayaran as Pembayaran;

class laporandptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('laporandpt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $awal = $request->tglawal;
        $akhir = $request->tglakhir;
        $data = DB::table('pembayaran')
                        ->leftJoin('pasiens', 'pembayaran.id_pasien', '=', 'pasiens.id')
                        ->leftJoin('users', 'pembayaran.id_dokter', '=', 'users.id')
                        ->leftJoin('rekam_medis', 'pembayaran.id_rekam_medis', '=', 'rekam_medis.id')
                        ->select('pasiens.nama as nama_pasien','users.name as nama_dokter','rekam_medis.keluhan as keluhan','pembayaran.total as total','pembayaran.created_at as tgl')
                        ->whereBetween('pembayaran.created_at', [$awal, $akhir])
                        ->orderby('pembayaran.id','ASC')
                        ->get();

        $sum = DB::table('pembayaran') 
                        ->whereBetween('pembayaran.created_at', [$awal, $akhir])                       
                        ->addSelect(DB::raw('total'))
                        ->get();
        $total = $sum->sum('total');
            return view('laporandpt.indexlaporan')->with('data', $data)->with('total', $total)->with('awal', $awal)->with('akhir', $akhir);
    }

     public function downdpt_pdf($tglawal,$tglakhir)
    {
        $awal = $tglawal;
        $akhir = $tglakhir;
        $data = DB::table('pembayaran')
                        ->leftJoin('pasiens', 'pembayaran.id_pasien', '=', 'pasiens.id')
                        ->leftJoin('users', 'pembayaran.id_dokter', '=', 'users.id')
                        ->leftJoin('rekam_medis', 'pembayaran.id_rekam_medis', '=', 'rekam_medis.id')
                        ->select('pasiens.nama as nama_pasien','users.name as nama_dokter','rekam_medis.keluhan as keluhan','pembayaran.total as total','pembayaran.created_at as tgl')
                        ->whereBetween('pembayaran.created_at', [$awal, $akhir])
                        ->orderby('pembayaran.id','ASC')
                        ->get();

        $sum = DB::table('pembayaran') 
                        ->whereBetween('pembayaran.created_at', [$awal, $akhir])                       
                        ->addSelect(DB::raw('total'))
                        ->get();
        $total = $sum->sum('total');

        $pdf = PDF::loadview('laporandpt/lapdpt_pdf',['data'=>$data,'awal'=>$awal,'akhir'=>$akhir, 'total'=>$total]);
        return $pdf->download('laporan-pendapatan.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function makeChart($tglawal,$tglakhir)
    {
        $awal = $tglawal;
        $akhir = $tglakhir;
         $data = DB::table('pembayaran')
                        ->leftJoin('pasiens', 'pembayaran.id_pasien', '=', 'pasiens.id')
                        ->leftJoin('users', 'pembayaran.id_dokter', '=', 'users.id')
                        ->leftJoin('rekam_medis', 'pembayaran.id_rekam_medis', '=', 'rekam_medis.id')
                        ->select('pasiens.nama as nama_pasien','users.name as nama_dokter','rekam_medis.keluhan as keluhan','pembayaran.total as total', 'pembayaran.created_at as created_at',
                            DB::raw('CONCAT(DATE_FORMAT(pembayaran.created_at,"%e"),"/",DATE_FORMAT(pembayaran.created_at,"%M"),"/",DATE_FORMAT(pembayaran.created_at,"%Y")) as date'))
                        ->whereBetween('pembayaran.created_at', [$awal, $akhir])
                        ->orderby('pembayaran.id','ASC')
                        ->get();
        $label = $data->pluck('date')->toArray();
      $chart= Charts::database($data, 'line', 'highcharts')
                    ->title('Chart Pendapatan')
                    ->elementLabel('Pendapatan')
                    ->labels($label)
                    ->values($data->pluck('total')->toArray())
                    ->dimensions(1000,500)
                    ->responsive(true);

        return view('laporandpt.chart_dpt',compact('chart'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
