<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateusersRequest;
use App\Http\Requests\UpdateusersRequest;
use App\Repositories\usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\groups as Groups;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Validator;

class usersController extends AppBaseController
{

    public function index()
    {
      
        if(request()->ajax())
        {
            return datatables()->of(DB::table('users')
                    ->leftJoin('groups', 'groups.id', '=', 'users.id_group')
                    ->select('users.id as id','users.name as name','users.phone as phone','users.email as email','users.jk as jk','users.alamat as alamat' , 'groups.nama as nama_group')
                    ->orderby('users.created_at','DESC')
                    ->latest()
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="users/'.$data->id.'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="users/'.$data->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('users.index');
    }
    /** @var  usersRepository */
    private $usersRepository;

    public function __construct(usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the users.
     *
     * @param Request $request
     *
     * @return Response
     */

    /**
     * Show the form for creating a new users.
     *
     * @return Response
     */
    public function create()
    {
        $groups = Groups::pluck('nama', 'id');


        return view('users.create')
        ->with('groups',$groups);
    }

    /**
     * Store a newly created users in storage.
     *
     * @param CreateusersRequest $request
     *
     * @return Response
     */
    public function store(CreateusersRequest $request)
    {
        $input = $request->all();

        $users = $this->usersRepository->create($input);

        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);
        $groups = Groups::pluck('nama', 'id');

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users)
        ->with('groups',$groups);
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);
        $groups = Groups::pluck('nama', 'id');

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users)->with('groups',$groups);
    }

    /**
     * Update the specified users in storage.
     *
     * @param int $id
     * @param UpdateusersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusersRequest $request)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $users = $this->usersRepository->update($data, $id);

        Flash::success('Users updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }
}
