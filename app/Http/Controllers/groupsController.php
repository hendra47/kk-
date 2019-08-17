<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategroupsRequest;
use App\Http\Requests\UpdategroupsRequest;
use App\Repositories\groupsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class groupsController extends AppBaseController
{
    /** @var  groupsRepository */
    private $groupsRepository;

    public function __construct(groupsRepository $groupsRepo)
    {
        $this->groupsRepository = $groupsRepo;
    }

    /**
     * Display a listing of the groups.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(request()->ajax())
            {
                return datatables()->of(DB::table('groups')
                        ->select('groups.id as id','groups.nama as nama')
                        ->orderby('groups.id','ASC')
                        ->latest()
                        ->get())
                        ->addColumn('action', function($data){
                            $button = '<a href="groups/'.$data->id.'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="groups/'.$data->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>';                        
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="groups/'.$data->id.'/destroy" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';

                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
        // $groups = $this->groupsRepository->all();

        return view('groups.index');
            // ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new groups.
     *
     * @return Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created groups in storage.
     *
     * @param CreategroupsRequest $request
     *
     * @return Response
     */
    public function store(CreategroupsRequest $request)
    {
        $input = $request->all();

        $groups = $this->groupsRepository->create($input);

        Flash::success('Groups saved successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Display the specified groups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $groups = $this->groupsRepository->find($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        return view('groups.show')->with('groups', $groups);
    }

    /**
     * Show the form for editing the specified groups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $groups = $this->groupsRepository->find($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        return view('groups.edit')->with('groups', $groups);
    }

    /**
     * Update the specified groups in storage.
     *
     * @param int $id
     * @param UpdategroupsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategroupsRequest $request)
    {
        $groups = $this->groupsRepository->find($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        $groups = $this->groupsRepository->update($request->all(), $id);

        Flash::success('Groups updated successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Remove the specified groups from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $groups = $this->groupsRepository->find($id);

        if (empty($groups)) {
            Flash::error('Groups not found');

            return redirect(route('groups.index'));
        }

        $this->groupsRepository->delete($id);

        Flash::success('Groups deleted successfully.');

        return redirect(route('groups.index'));
    }
}
