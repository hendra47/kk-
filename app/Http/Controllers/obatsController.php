<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateobatsRequest;
use App\Http\Requests\UpdateobatsRequest;
use App\Repositories\obatsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class obatsController extends AppBaseController
{
    /** @var  obatsRepository */
    private $obatsRepository;

    public function __construct(obatsRepository $obatsRepo)
    {
        $this->obatsRepository = $obatsRepo;
    }

    /**
     * Display a listing of the obats.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
         if(request()->ajax())
        {
            return datatables()->of(DB::table('obats')
                    ->select('obats.id as id','obats.code as code','obats.nama as nama','obats.jenis as jenis','obats.satuan as satuan','obats.harga_jual as harga_jual')
                    ->where('obats.deleted_at', '=', Null)
                    ->orderby('obats.created_at','DESC')
                    ->latest()
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="obats/'.$data->id.'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="obats/'.$data->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>';                        
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="obats/'.$data->id.'/destroy" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('obats.index');
    }

    /**
     * Show the form for creating a new obats.
     *
     * @return Response
     */
    public function create()
    {
        return view('obats.create');
    }

    /**
     * Store a newly created obats in storage.
     *
     * @param CreateobatsRequest $request
     *
     * @return Response
     */
    public function store(CreateobatsRequest $request)
    {
        $input = $request->all();

        $obats = $this->obatsRepository->create($input);

        Flash::success('Obats saved successfully.');

        return redirect(route('obats.index'));
    }

    /**
     * Display the specified obats.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $obats = $this->obatsRepository->find($id);

        if (empty($obats)) {
            Flash::error('Obats not found');

            return redirect(route('obats.index'));
        }

        return view('obats.show')->with('obats', $obats);
    }

    /**
     * Show the form for editing the specified obats.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $obats = $this->obatsRepository->find($id);

        if (empty($obats)) {
            Flash::error('Obats not found');

            return redirect(route('obats.index'));
        }

        return view('obats.edit')->with('obats', $obats);
    }

    /**
     * Update the specified obats in storage.
     *
     * @param int $id
     * @param UpdateobatsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateobatsRequest $request)
    {
        $obats = $this->obatsRepository->find($id);

        if (empty($obats)) {
            Flash::error('Obats not found');

            return redirect(route('obats.index'));
        }

        $obats = $this->obatsRepository->update($request->all(), $id);

        Flash::success('Obats updated successfully.');

        return redirect(route('obats.index'));
    }

    /**
     * Remove the specified obats from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $obats = $this->obatsRepository->find($id);

        if (empty($obats)) {
            Flash::error('Obats not found');

            return redirect(route('obats.index'));
        }

        $this->obatsRepository->delete($id);

        Flash::success('Obats deleted successfully.');

        return redirect(route('obats.index'));
    }
}
