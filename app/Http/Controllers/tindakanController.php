<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetindakanRequest;
use App\Http\Requests\UpdatetindakanRequest;
use App\Repositories\tindakanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class tindakanController extends AppBaseController
{
    /** @var  tindakanRepository */
    private $tindakanRepository;

    public function __construct(tindakanRepository $tindakanRepo)
    {
        $this->tindakanRepository = $tindakanRepo;
    }

    /**
     * Display a listing of the tindakan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
         if(request()->ajax())
        {
            return datatables()->of(DB::table('tindakan')
                    ->select('tindakan.id as id','tindakan.code as code','tindakan.type as type','tindakan.nama as nama','tindakan.biaya as biaya')
                    ->where('tindakan.deleted_at', '=', Null)
                    ->orderby('tindakan.created_at','DESC')
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="tindakan/'.$data->id.'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="tindakan/'.$data->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>';                        
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="tindakan/'.$data->id.'/destroy" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('tindakan.index');
    }

    /**
     * Show the form for creating a new tindakan.
     *
     * @return Response
     */
    public function create()
    {
        return view('tindakan.create');
    }

    /**
     * Store a newly created tindakan in storage.
     *
     * @param CreatetindakanRequest $request
     *
     * @return Response
     */
    public function store(CreatetindakanRequest $request)
    {
        $input = $request->all();

        $tindakan = $this->tindakanRepository->create($input);

        Flash::success('tindakan saved successfully.');

        return redirect(route('tindakan.index'));
    }

    /**
     * Display the specified tindakan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tindakan = $this->tindakanRepository->find($id);

        if (empty($tindakan)) {
            Flash::error('tindakan not found');

            return redirect(route('tindakan.index'));
        }

        return view('tindakan.show')->with('tindakan', $tindakan);
    }

    /**
     * Show the form for editing the specified tindakan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tindakan = $this->tindakanRepository->find($id);

        if (empty($tindakan)) {
            Flash::error('tindakan not found');

            return redirect(route('tindakan.index'));
        }

        return view('tindakan.edit')->with('tindakan', $tindakan);
    }

    /**
     * Update the specified tindakan in storage.
     *
     * @param int $id
     * @param UpdatetindakanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetindakanRequest $request)
    {
        $tindakan = $this->tindakanRepository->find($id);

        if (empty($tindakan)) {
            Flash::error('tindakan not found');

            return redirect(route('tindakan.index'));
        }

        $tindakan = $this->tindakanRepository->update($request->all(), $id);

        Flash::success('tindakan updated successfully.');

        return redirect(route('tindakan.index'));
    }

    /**
     * Remove the specified tindakan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tindakan = $this->tindakanRepository->find($id);

        if (empty($tindakan)) {
            Flash::error('tindakan not found');

            return redirect(route('tindakan.index'));
        }

        $this->tindakanRepository->delete($id);

        Flash::success('tindakan deleted successfully.');

        return redirect(route('tindakan.index'));
    }
}
