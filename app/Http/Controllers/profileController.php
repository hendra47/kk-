<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use App\Repositories\profileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class profileController extends AppBaseController
{
    /** @var  profileRepository */
    private $profileRepository;

    public function __construct(profileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the profile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $profiles = $this->profileRepository->all();

        return view('profiles.index')
            ->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new profile.
     *
     * @return Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created profile in storage.
     *
     * @param CreateprofileRequest $request
     *
     * @return Response
     */
    public function store(CreateprofileRequest $request)
    {
        $input = $request->all();

        $profile = $this->profileRepository->create($input);

        Flash::success('Profile saved successfully.');

        return redirect(route('profiles.index'));
    }

    /**
     * Display the specified profile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profile = $this->profileRepository->find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profile = $this->profileRepository->find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.edit')->with('profile', $profile);
    }

    /**
     * Update the specified profile in storage.
     *
     * @param int $id
     * @param UpdateprofileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprofileRequest $request)
    {
        $data = $request->all();
        $file = $request->file('photo');
        if($file){
            $tujuan_upload = 'public/img';
            $nama_file = time()."_".$file->getClientOriginalName();

            $file->move($tujuan_upload,$nama_file);
            $data['photo']=$nama_file;
        }

        $profile = $this->profileRepository->find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }


        $profile = $this->profileRepository->update($data, $id);

        Flash::success('Profile updated successfully.');
        $profile = $this->profileRepository->find($id);


        return redirect(route('profiles.edit', ['profile' => $profile]));
    }

    /**
     * Remove the specified profile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profile = $this->profileRepository->find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $this->profileRepository->delete($id);

        Flash::success('Profile deleted successfully.');

        return redirect(route('profiles.index'));
    }
}
