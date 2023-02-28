<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusMate;
use App\Http\Requests\StoreMate;
use App\Services\FrogService;
use App\Services\MateService;

class MateController extends Controller
{
    /**
     * The mate service instance.
     * 
     */
    private $mateService;

    /**
     * The frog service instance.
     * 
     */
    private $frogService;

    /**
     * Create a new controller instance.
     *
     * @param MateService $mateService
     * @param FrogService $frogService
     * @return void
     */
    public function __construct(MateService $mateService, FrogService $frogService)
    {
        $this->middleware('auth');

        $this->mateService = $mateService;
        $this->frogService = $frogService;
    }

    /**
     * Show a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('mate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('mate.create', [
            'males' => $this->frogService->frogsNotInMating(1),
            'females' => $this->frogService->frogsNotInMating(2),
        ]);
    }

    /**
     * Create new mating.
     *
     * @param StoreMate $request
     * @return Redirect
     */
    public function store(StoreMate $request)
    {
        $this->mateService->create($request->all());
        return redirect('/mates')->with('success', 'Mating Successful!');
    }

    /**
     * Update mating status.
     *
     * @param StatusMate $request
     * @param Int $id
     * 
     * @return Redirect
     */
    public function status(StatusMate $request, $id)
    {
        $this->mateService->status($id, $request->all());
        return redirect('/mates')->with('success', 'Mating Status Updated Successfully!');
    }

    /**
     * Generate datatable
     *
     * @return Datatable
     */
    public function datatable()
    {
        return $this->mateService->makeDatatable();
    }
}
