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
use App\Models\daftars as Daftars;
use Illuminate\Support\Facades\DB;

class daftarsController extends AppBaseController
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
    public function index(Request $request)
    {

        if(request()->ajax())
        {
            return datatables()->of(DB::table('daftars')
                    ->leftJoin('pasiens', 'daftars.id_pasien', '=', 'pasiens.id')
                    ->leftJoin('users', 'daftars.id_dokter', '=', 'users.id')
                    ->select('daftars.*', 'pasiens.nama as nama_pasien','users.name as nama_dokter','daftars.id')
                    ->where('daftars.deleted_at', '=', Null)
                    ->orderby('daftars.id','DESC')
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="daftars/'.$data->id.'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="daftars/'.$data->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>';                        
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="daftars/'.$data->id.'/destroy" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('daftars.index');
    }

    /**
     * Show the form for creating a new daftars.
     *
     * @return Response
     */
    public function create()
    {
     
        $pasiens = Pasiens::pluck('nama', 'id');
        $dokter = Users::where('is_doctor',1)->pluck('name', 'id');
        $selectedID = 0;

        return view('daftars.create')
        ->with('selectedID', $selectedID)
        ->with('pasiens', $pasiens)
        ->with('dokter', $dokter);

    }

    /**
     * Store a newly created daftars in storage.
     *
     * @param CreatedaftarsRequest $request
     *
     * @return Response
     */
    public function store(CreatedaftarsRequest $request)
    {
        $tgl = date('Y-m-d');

        $id = DB::table('daftars')->where('tgl', $tgl)->get();
        $decode = count($id)+1; 
        
        $request->merge(['decode'=> $decode]);
        $input = $request->all();

        $daftars = $this->daftarsRepository->create($input);

        Flash::success('Daftars saved successfully.');

        return redirect(route('daftars.index'));
    }

    /**
     * Display the specified daftars.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $daftars = $this->daftarsRepository->find($id);

        if (empty($daftars)) {
            Flash::error('Daftars not found');

            return redirect(route('daftars.index'));
        }

        return view('daftars.show')->with('daftars', $daftars);
    }

    /**
     * Show the form for editing the specified daftars.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $daftars = $this->daftarsRepository->find($id);

        if (empty($daftars)) {
            Flash::error('Daftars not found');

            return redirect(route('daftars.index'));
        }


        // $pasiens = Pasiens::pluck('nama', 'id');
        // $selectedID = 0;

        // return view('daftars.edit')
        // ->with('daftars', $daftars)
        // ->with('pasiens', $pasiens)
        // ->with('selectedID', $selectedID);


        $pasiens = Pasiens::pluck('nama', 'id');
        $dokter = Users::where('is_doctor',1)->pluck('name', 'id');
        $selectedID = 0;

        return view('daftars.edit')
        ->with('selectedID', $selectedID)
        ->with('pasiens', $pasiens)
        ->with('daftars', $daftars)
        ->with('dokter', $dokter);
    }

    /**
     * Update the specified daftars in storage.
     *
     * @param int $id
     * @param UpdatedaftarsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedaftarsRequest $request)
    {
        $daftars = $this->daftarsRepository->find($id);

        if (empty($daftars)) {
            Flash::error('Daftars not found');

            return redirect(route('daftars.index'));
        }

        $daftars = $this->daftarsRepository->update($request->all(), $id);

        Flash::success('Daftars updated successfully.');

        return redirect(route('daftars.index'));
    }

    /**
     * Remove the specified daftars from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $daftars = $this->daftarsRepository->find($id);

        if (empty($daftars)) {
            Flash::error('Daftars not found');

            return redirect(route('daftars.index'));
        }

        $this->daftarsRepository->delete($id);

        Flash::success('Daftars deleted successfully.');

        return redirect(route('daftars.index'));
    }

}
