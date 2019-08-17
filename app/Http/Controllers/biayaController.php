<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebiayaRequest;
use App\Http\Requests\UpdatebiayaRequest;
use App\Repositories\biayaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class biayaController extends AppBaseController
{
    /** @var  biayaRepository */
    private $biayaRepository;

    public function __construct(biayaRepository $biayaRepo)
    {
        $this->biayaRepository = $biayaRepo;
    }

    /**
     * Display a listing of the biaya.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $biayas = $this->biayaRepository->all();

        return view('biayas.index')
            ->with('biayas', $biayas);
    }

    /**
     * Show the form for creating a new biaya.
     *
     * @return Response
     */
    public function create()
    {
        return view('biayas.create');
    }

    /**
     * Store a newly created biaya in storage.
     *
     * @param CreatebiayaRequest $request
     *
     * @return Response
     */
    public function store(CreatebiayaRequest $request)
    {
        $input = $request->all();

        $biaya = $this->biayaRepository->create($input);

        Flash::success('Biaya saved successfully.');

        return redirect(route('biayas.index'));
    }

    /**
     * Display the specified biaya.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $biaya = $this->biayaRepository->find($id);

        if (empty($biaya)) {
            Flash::error('Biaya not found');

            return redirect(route('biayas.index'));
        }

        return view('biayas.show')->with('biaya', $biaya);
    }

    /**
     * Show the form for editing the specified biaya.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $biaya = $this->biayaRepository->find($id);

        if (empty($biaya)) {
            Flash::error('Biaya not found');

            return redirect(route('biayas.index'));
        }

        return view('biayas.edit')->with('biaya', $biaya);
    }

    /**
     * Update the specified biaya in storage.
     *
     * @param int $id
     * @param UpdatebiayaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebiayaRequest $request)
    {
        $biaya = $this->biayaRepository->find($id);

        if (empty($biaya)) {
            Flash::error('Biaya not found');

            return redirect(route('biayas.index'));
        }

        $biaya = $this->biayaRepository->update($request->all(), $id);

        Flash::success('Biaya updated successfully.');

        return redirect(route('biayas.index'));
    }

    /**
     * Remove the specified biaya from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $biaya = $this->biayaRepository->find($id);

        if (empty($biaya)) {
            Flash::error('Biaya not found');

            return redirect(route('biayas.index'));
        }

        $this->biayaRepository->delete($id);

        Flash::success('Biaya deleted successfully.');

        return redirect(route('biayas.index'));
    }
}
