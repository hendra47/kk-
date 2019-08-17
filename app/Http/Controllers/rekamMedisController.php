<?php

namespace App\Http\Controllers;

// use App\Http\Requests\CreaterekamMedisRequest;
use App\Http\Requests\UpdaterekamMedisRequest;
// use App\Repositories\rekamMedisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class rekamMedisController extends AppBaseController
{
    /** @var  rekamMedisRepository */
    // private $rekamMedisRepository;

    // public function __construct(rekamMedisRepository $rekamMedisRepo)
    // {
    //     $this->rekamMedisRepository = $rekamMedisRepo;
    // }

    /**
     * Display a listing of the rekamMedis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
     if(request()->ajax())
            {
                return datatables()->of(DB::table('rekam_medis')
                        ->join('users', 'users.id', '=', 'rekam_medis.id_dokter')
                        ->join('pasiens', 'pasiens.id', '=', 'rekam_medis.id_pasien')
                        ->select('rekam_medis.created_at as created_at','rekam_medis.id_pasien as id_pasien','rekam_medis.keluhan as keluhan','rekam_medis.note as note','users.name as nama_dokter', 'pasiens.nama as nama_pasien')
                        ->orderby('rekam_medis.created_at','DESC')
                        ->latest()
                        ->get())
                        ->make(true);
            }
        

        return view('rekam_medis.index');
    }

    public function getObat()
    {

        $obats = DB::table('obats')
        ->get();

        return Response::json([
            'data' => $obats,
            'status' => true
        ], 200);
    }

     public function getTindakan()
    {

        $tindakan = DB::table('tindakan')
        ->get();
        // var_dump($tindakan);
        return Response::json([
            'data' => $tindakan,
            'status' => true
        ], 200);
    }

    /**
     * Show the form for creating a new rekamMedis.
     *
     * @return Response
     */
    public function create()
    {
        return view('rekam_medis.create');
    }

    /**
     * Store a newly created rekamMedis in storage.
     *
     * @param CreaterekamMedisRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'keluhan' => 'required',
            'note' => 'required',
        ]);


    DB::beginTransaction();
    try {

        $input = $request->all();

        // $is_tindakan = 0;
        $tindakan = count($request->input('nama_tindakan'));

            if($tindakan > 0){
                $is_tindakan = 1;
            }else{
                $is_tindakan = 0;
            }
        //table rekam medis
        $data_rm = array(
            "id_pasien"=>$input['id_pasien'],
            "id_dokter"=>$input['id_dokter'],
            "keluhan"=>$input['keluhan'],
            "id_daftar"=>$input['id_daftar'],
            "note"=>$input['note'],
            "alergi_obat"=>$input['alergi_obat'],
            "is_tindakan"=>$is_tindakan,
            "created_at"=>NOW(),
            "updated_at"=>NOW()
        );
        $id = DB::table('rekam_medis')->insertGetId($data_rm);

        //table pembayaran
        $data_pemb = array(
            "id_pasien"=>$input['id_pasien'],
            "id_dokter"=>$input['id_dokter'],
            "id_rekam_medis"=>$id,
            "id_daftar"=>$input['id_daftar'],
            "note"=>$input['note'],
            "is_tindakan"=>$is_tindakan,
            "created_at"=>NOW(),
            "updated_at"=>NOW()
        );
        $id_pembayaran = DB::table('pembayaran')->insertGetId($data_pemb);

        if(isset($input['nama_tindakan'])){
            //table rekam medis detail1
            $arr_tindakan=array();
            foreach ($input['nama_tindakan'] as $key => $value) {
                $arr_tindakan['tindakan']=$value;
                $arr_tindakan['id_rekam_medis']=$id;
                $arr_tindakan['created_at']=NOW();
                $arr_tindakan['updated_at']=NOW();
            DB::table('rekam_medis_detail1')->insert($arr_tindakan);
            }
            
            //table pembayaran detail1
            $arr_tindakan_bayar=array();
            foreach ($input['nama_tindakan'] as $key => $value) {
                $arr_tindakan_bayar['tindakan']=$value;
                $arr_tindakan_bayar['id_pembayaran']=$id_pembayaran;
                $arr_tindakan_bayar['created_at']=NOW();
                $arr_tindakan_bayar['updated_at']=NOW();
            DB::table('pembayaran_detail1')->insert($arr_tindakan_bayar);
            }
        }

        if(isset($input['nama_obat'])){
            //table rekam medis detail2
            $arr_obat=array();
            $i=0;
            foreach ($input['nama_obat'] as $key => $value) {
                $arr_obat['id_obat']=$value;
                $arr_obat['id_rekam_medis']=$id;
                $arr_obat['qty']=$input['qty'][$i];
                $arr_obat['note']=$input['note_obat'][$i];
                $arr_obat['created_at']=NOW();
                $arr_obat['updated_at']=NOW();
                $i++;
            DB::table('rekam_medis_detail2')->insert($arr_obat);
            }
            //table pembayaran detail2
            $arr_obat_bayar=array();
            $i=0;
            foreach ($input['nama_obat'] as $key => $value) {
                $arr_obat_bayar['id_obat']=$value;
                $arr_obat_bayar['id_pembayaran']=$id_pembayaran;
                $arr_obat_bayar['qty']=$input['qty'][$i];
                $arr_obat_bayar['note']=$input['note_obat'][$i];
                $arr_obat_bayar['created_at']=NOW();
                $arr_obat_bayar['updated_at']=NOW();
                $i++;
            DB::table('pembayaran_detail2')->insert($arr_obat_bayar);
            }
        }
        // update pendafaftaran
        $tdkn = count($request->input('nama_tindakan'));
        $obt = count($request->input('nama_obat'));

        if($obt > 0){
            DB::table('daftars')
            ->where('id', $input['id_daftar'])
            ->update(['status' => 3]);
        }else{
             DB::table('daftars')
            ->where('id', $input['id_daftar'])
            ->update(['status' => 4]);
        }

        DB::commit();
            /*all good*/
            Flash::success('Rekam Medis saved successfully.');

            return redirect(route('rekamMedis.index'));
        } catch (\Exception $e) {
            DB::rollback();
    // something went wrong
            Flash::error('Sorry, your data Unsuccessfully.');
            return redirect(route('rekamMedis.index'));
        }    

        
    }

    /**
     * Display the specified rekamMedis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rekamMedis = $this->rekamMedisRepository->find($id);

        if (empty($rekamMedis)) {
            Flash::error('Rekam Medis not found');

            return redirect(route('rekamMedis.index'));
        }

        return view('rekam_medis.show')->with('rekamMedis', $rekamMedis);
    }

    /**
     * Show the form for editing the specified rekamMedis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // update status pendafataran ke status 2 (periksa)
        DB::table('daftars')
            ->where('id', $id)
            ->update(['status' => 2]);

        $daftars = DB::table('daftars')
        ->where('id', $id)
        ->get();

        $pasiens = DB::table('pasiens')
        ->where('id', $daftars[0]->id_pasien)
        ->get();


        $dokters = DB::table('users')
        ->where('id', $daftars[0]->id_dokter)
        ->get();

        return view('rekam_medis.edit')
        ->with('pasiens',$pasiens[0])
        ->with('daftars',$daftars[0])
        ->with('dokters',$dokters[0]);
    }

    /**
     * Update the specified rekamMedis in storage.
     *
     * @param int $id
     * @param UpdaterekamMedisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterekamMedisRequest $request)
    {
        $rekamMedis = $this->rekamMedisRepository->find($id);

        if (empty($rekamMedis)) {
            Flash::error('Rekam Medis not found');

            return redirect(route('rekamMedis.index'));
        }

        $rekamMedis = $this->rekamMedisRepository->update($request->all(), $id);

        Flash::success('Rekam Medis updated successfully.');

        return redirect(route('rekamMedis.index'));
    }

    /**
     * Remove the specified rekamMedis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rekamMedis = $this->rekamMedisRepository->find($id);

        if (empty($rekamMedis)) {
            Flash::error('Rekam Medis not found');

            return redirect(route('rekamMedis.index'));
        }

        $this->rekamMedisRepository->delete($id);

        Flash::success('Rekam Medis deleted successfully.');

        return redirect(route('rekamMedis.index'));
    }
}
