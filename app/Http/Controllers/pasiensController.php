<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepasiensRequest;
use App\Http\Requests\UpdatepasiensRequest;
use App\Repositories\pasiensRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class pasiensController extends AppBaseController
{
    /** @var  pasiensRepository */
    private $pasiensRepository;

    public function __construct(pasiensRepository $pasiensRepo)
    {
        $this->pasiensRepository = $pasiensRepo;
    }

    /**
     * Display a listing of the pasiens.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       if(request()->ajax())
        {
            return datatables()->of(DB::table('pasiens')
                    ->select('pasiens.id as id','pasiens.nama as nama','pasiens.tgl_lahir as tgl_lahir','pasiens.jk as jk','pasiens.alamat as alamat','pasiens.no_ktp as no_ktp')
                    ->where('pasiens.deleted_at', '=', Null)
                    ->orderby('pasiens.created_at','DESC')
                    ->latest()
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="pasiens/'.$data->id.'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="pasiens/'.$data->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>';                        
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="pasiens/'.$data->id.'/destroy" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pasiens.index');
    }

    /**
     * Show the form for creating a new pasiens.
     *
     * @return Response
     */
    public function create()
    {
        return view('pasiens.create');
    }

    /**
     * Store a newly created pasiens in storage.
     *
     * @param CreatepasiensRequest $request
     *
     * @return Response
     */
    public function store(CreatepasiensRequest $request)
    {
        $input = $request->all();

        $pasiens = $this->pasiensRepository->create($input);

        Flash::success('Pasiens saved successfully.');

        return redirect(route('pasiens.index'));
    }

    /**
     * Display the specified pasiens.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pasiens = $this->pasiensRepository->find($id);

        if (empty($pasiens)) {
            Flash::error('Pasiens not found');

            return redirect(route('pasiens.index'));
        }

        return view('pasiens.show')->with('pasiens', $pasiens);
    }

    /**
     * Show the form for editing the specified pasiens.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pasiens = $this->pasiensRepository->find($id);

        if (empty($pasiens)) {
            Flash::error('Pasiens not found');

            return redirect(route('pasiens.index'));
        }

        return view('pasiens.edit')->with('pasiens', $pasiens);
    }

    /**
     * Update the specified pasiens in storage.
     *
     * @param int $id
     * @param UpdatepasiensRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepasiensRequest $request)
    {
        $pasiens = $this->pasiensRepository->find($id);

        if (empty($pasiens)) {
            Flash::error('Pasiens not found');

            return redirect(route('pasiens.index'));
        }

        $pasiens = $this->pasiensRepository->update($request->all(), $id);

        Flash::success('Pasiens updated successfully.');

        return redirect(route('pasiens.index'));
    }

    /**
     * Remove the specified pasiens from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pasiens = $this->pasiensRepository->find($id);

        if (empty($pasiens)) {
            Flash::error('Pasiens not found');

            return redirect(route('pasiens.index'));
        }

        $this->pasiensRepository->delete($id);

        Flash::success('Pasiens deleted successfully.');

        return redirect(route('pasiens.index'));
    }
}
