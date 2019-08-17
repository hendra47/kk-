<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesettingsRequest;
use App\Http\Requests\UpdatesettingsRequest;
use App\Repositories\settingsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class settingsController extends AppBaseController
{
    /** @var  settingsRepository */
    private $settingsRepository;

    public function __construct(settingsRepository $settingsRepo)
    {
        $this->settingsRepository = $settingsRepo;
    }

    /**
     * Display a listing of the settings.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $settings = $this->settingsRepository->all();

        return view('settings.index')
            ->with('settings', $settings);
    }

    /**
     * Show the form for creating a new settings.
     *
     * @return Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created settings in storage.
     *
     * @param CreatesettingsRequest $request
     *
     * @return Response
     */
    public function store(CreatesettingsRequest $request)
    {
        $input = $request->all();

        var_dump($input);
        $settings = $this->settingsRepository->create($input);

        Flash::success('Settings saved successfully.');

        return redirect(route('settings.index'));
    }

    /**
     * Display the specified settings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $settings = $this->settingsRepository->find($id);

        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        return view('settings.show')->with('settings', $settings);
    }

    /**
     * Show the form for editing the specified settings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $settings = $this->settingsRepository->find($id);

        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        return view('settings.edit')->with('settings', $settings);
    }

    /**
     * Update the specified settings in storage.
     *
     * @param int $id
     * @param UpdatesettingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesettingsRequest $request)
    {
        $settings = $this->settingsRepository->find($id);

        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        $settings = $this->settingsRepository->update($request->all(), $id);

        Flash::success('Settings updated successfully.');

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified settings from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $settings = $this->settingsRepository->find($id);

        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        $this->settingsRepository->delete($id);

        Flash::success('Settings deleted successfully.');

        return redirect(route('settings.index'));
    }
}
