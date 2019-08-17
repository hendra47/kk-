<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepembayaranRequest;
use App\Http\Requests\UpdatepembayaranRequest;
// use App\Repositories\pembayaranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class apotekController extends AppBaseController
{
    /** @var  pembayaranRepository */
    // private $pembayaranRepository;

    // public function __construct(pembayaranRepository $pembayaranRepo)
    // {
    //     $this->pembayaranRepository = $pembayaranRepo;
    // }

    /**
     * Display a listing of the pembayaran.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
     if(request()->ajax())
            {
                return datatables()->of(DB::table('pembayaran')
                        ->join('pembayaran_detail2', 'pembayaran_detail2.id_pembayaran', '=', 'pembayaran.id')
                        ->join('users', 'users.id', '=', 'pembayaran.id_dokter')
                        ->join('pasiens', 'pasiens.id', '=', 'pembayaran.id_pasien')
                        ->select('pembayaran.biaya_obat as biaya_obat','pembayaran.note as note','pembayaran.id as id','pembayaran.created_at as created_at', 'pasiens.nama as nama_pasien','users.name as nama_dokter','pembayaran.id_daftar as id_daftar')
                        ->orderby('pembayaran.id','DESC')
                        ->groupby('biaya_obat','note','id','created_at','nama_pasien','nama_dokter','id_daftar')
                        ->get())
                        ->addColumn('action', function($data){
                            $button = '<a href="apotek/'.$data->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>';     

                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
        return view('apotek.index');
    }

    /**
     * Show the form for creating a new pembayaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('apotek.create');
    }

    /**
     * Store a newly created pembayaran in storage.
     *
     * @param CreatepembayaranRequest $request
     *
     * @return Response
     */
    public function store(request $request)
    {
        $input = $request->all();
        // dd($input);

        // update pembayaran
        DB::table('pembayaran')
            ->where('id', $input['id_pembayaran'])
            ->update(['biaya_obat' => $input['biaya_obat'],'total' => $input['biaya_obat']]);

        
        // update daftar status
        DB::table('daftars')
            ->where('id', $input['id_daftar'])
            ->update(['status' => 4]);

        Flash::success('Pembayaran saved successfully.');

        return redirect(route('apotek.index'));
    }

    /**
     * Display the specified pembayaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembayaran = $this->pembayaranRepository->find($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('apotek.index'));
        }

        return view('apotek.show')->with('pembayaran', $pembayaran);
    }

    /**
     * Show the form for editing the specified pembayaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // $pembayaran = $this->pembayaranRepository->find($id);

        // if (empty($pembayaran)) {
        //     Flash::error('Pembayaran not found');

        //     return redirect(route('apotek.index'));
        // }
        $pembayaran="";

        $pembayaran = DB::table('pembayaran')
        ->where('id', $id)
        ->get();
        // dd($daftars[0]);

        $pasiens = DB::table('pasiens')
        ->where('id', $pembayaran[0]->id_pasien)
        ->get();


        $dokters = DB::table('users')
        ->where('id', $pembayaran[0]->id_dokter)
        ->get();


        $pembayaran_detail1 = DB::table('pembayaran_detail1')
        ->join('tindakan', 'tindakan.id', '=', 'pembayaran_detail1.tindakan')
        ->select('pembayaran_detail1.*','tindakan.nama as nama_tindakan','tindakan.biaya as harga')
        ->where('id_pembayaran', $pembayaran[0]->id)
        ->get();


        $pembayaran_detail2 = DB::table('pembayaran_detail2')
        ->join('obats', 'obats.id', '=', 'pembayaran_detail2.id_obat')
        ->select('pembayaran_detail2.*','obats.nama as nama_obat','obats.harga_jual as harga')
        ->where('pembayaran_detail2.id_pembayaran', $pembayaran[0]->id)
        ->get();

        return view('apotek.edit')
        ->with('pasiens',$pasiens[0])
        ->with('pembayaran',$pembayaran[0])
        ->with('dokters',$dokters[0])
        ->with('pembayaran_detail1',$pembayaran_detail1)
        ->with('biaya_obat',$biaya_obat=0)
        ->with('pembayaran_detail2',$pembayaran_detail2);
    }

    /**
     * Update the specified pembayaran in storage.
     *
     * @param int $id
     * @param UpdatepembayaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepembayaranRequest $request)
    {
        $pembayaran = $this->pembayaranRepository->find($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('apotek.index'));
        }

        $pembayaran = $this->pembayaranRepository->update($request->all(), $id);

        Flash::success('Pembayaran updated successfully.');


        return redirect(route('apotek.index'));
    }

    /**
     * Remove the specified pembayaran from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembayaran = $this->pembayaranRepository->find($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('apotek.index'));
        }

        $this->pembayaranRepository->delete($id);

        Flash::success('Pembayaran deleted successfully.');

        return redirect(route('apotek.index'));
    }
}
