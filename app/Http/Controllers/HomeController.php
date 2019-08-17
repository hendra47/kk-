<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                if(request()->ajax())
        {
            return datatables()->of(DB::table('daftars')
                    ->leftJoin('pasiens', 'daftars.id_pasien', '=', 'pasiens.id')
                    ->leftJoin('users', 'daftars.id_dokter', '=', 'users.id')
                    ->select('daftars.*','daftars.id_pasien','pasiens.jk as jk','pasiens.nama as nama_pasien','users.name as nama_dokter','daftars.decode as decode',
                        DB::raw('(CASE WHEN daftars.status = "1" THEN "Antri" WHEN daftars.status = "2" THEN "Periksa" WHEN daftars.status = "3" THEN "Apotek" WHEN daftars.status = "4" THEN "Kasir" ELSE "Pulang" END) AS status_pasien')
                    )
                    ->where('pulang',null)
                    ->whereDate('daftars.tgl', DB::raw('CURDATE()'))
                    ->orderBy('daftars.id','DESC')
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="rekamMedis/'.$data->id.'/edit"  class="btn btn-success"><i class="fa fa-group"></i></a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
                    $total_pasiens = DB::table('pasiens')->count();
                    $total_pasiens_today = DB::table('daftars')->whereDate('tgl', DB::raw('CURDATE()'))->count();
                    $total_antri = DB::table('daftars')->whereDate('tgl', DB::raw('CURDATE()'))->where('status',1)->count();
                    $total_periksa = DB::table('daftars')->whereDate('tgl', DB::raw('CURDATE()'))->where('status',2)->count();
                    $total_apotek = DB::table('daftars')->whereDate('tgl', DB::raw('CURDATE()'))->where('status',3)->count();
                    $total_kasir = DB::table('daftars')->whereDate('tgl', DB::raw('CURDATE()'))->where('status',4)->count();
                    $total_pulang = DB::table('daftars')->whereDate('tgl', DB::raw('CURDATE()'))->where('status',5)->count();

            return view('home')
                    ->with('total_pasiens', $total_pasiens)
                    ->with('total_pasiens_today', $total_pasiens_today)
                    ->with('total_antri', $total_antri)
                    ->with('total_periksa', $total_periksa)
                    ->with('total_apotek', $total_apotek)
                    ->with('total_kasir', $total_kasir)
                    ->with('total_pulang', $total_pulang);

        // $daftars = DB::table('daftars')
        // ->leftJoin('pasiens', 'daftars.id_pasien', '=', 'pasiens.id')
        // ->leftJoin('users', 'daftars.id_dokter', '=', 'users.id')
        // ->select('daftars.*','daftars.id_pasien','pasiens.jk as jk' ,'pasiens.nama as nama_pasien','users.name as nama_dokter')
        // ->where('pulang',null)
        // ->get();
        // $total_pasiens = DB::table('pasiens')->count();
        // $total_pasiens_today = DB::table('daftars')->whereDate('tgl', DB::raw('CURDATE()'))->count();
        // // dd($daftars);
        // return view('home')
        //     ->with('daftars', $daftars)
        //     ->with('total_pasiens', $total_pasiens)
        //     ->with('total_pasiens_today', $total_pasiens_today);
    }
}
