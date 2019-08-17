<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedaftarsRequest;
use App\Http\Requests\UpdatedaftarsRequest;
use App\Repositories\daftarsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\pasiens as Pasiens;
use App\Models\users as Users;
use App\Models\obats as Obats;
use Illuminate\Support\Facades\DB;
use PDF;

class laporanobatController extends Controller
{
    /** @var  daftarsRepository */
    private $daftarsRepository;

    public function __construct(daftarsRepository $daftarsRepo)
    {
        $this->daftarsRepository = $daftarsRepo;
    }

    /**
     * Display a listing of the daftars.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index()
    {
       
        return view('laporanobat.index');
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
      $data = DB::table('obats')
                        ->select('obats.*')
                        ->where('obats.deleted_at', '=', Null)
                        ->whereBetween('obats.created_at', [$awal, $akhir])
                        ->orderby('obats.id','DESC')
                        ->get();

            return view('laporanobat.indexlaporan')->with('data', $data)->with('awal', $awal)->with('akhir', $akhir);

    }
   
     public function downobat_pdf($tglawal,$tglakhir)
        {
        $awal = $tglawal;
        $akhir = $tglakhir;
          $data = DB::table('obats')
                        ->select('obats.*')
                        ->where('obats.deleted_at', '=', Null)
                        ->whereBetween('obats.created_at', [$awal, $akhir])
                        ->orderby('obats.id','DESC')
                        ->get();
     // dd($awal);
        $pdf = PDF::loadview('laporanobat/lapobat_pdf',['data'=>$data,'awal'=>$awal,'akhir'=>$akhir]);
        return $pdf->download('laporan-obat.pdf');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
  
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
