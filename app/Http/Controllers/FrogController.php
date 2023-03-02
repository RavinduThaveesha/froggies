<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFrog;
use App\Services\FrogService;
use App\Services\TypeService;

class FrogController extends Controller
{
    /**
     * The frog service instance.
     * 
     */
    private $frogService;

    /**
     * The type service instance.
     *
     */
    private $typeService;

    /**
     * Create a new controller instance.
     *
     * @param FrogService $frogService
     * @param TypeService $typeService
     * @return void
     */
    public function __construct(FrogService $frogService, TypeService $typeService)
    {
        $this->frogService = $frogService;
        $this->typeService = $typeService;
    }

    /**
     * Show a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('frog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('frog.create', ['types' => $this->typeService->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFrog  $request
     * @return Redirect
     */
    public function store(StoreFrog $request)
    {
        $this->frogService->store($request->all());
        return redirect('/frogs')->with('success', 'Frog Added Successfully!');
    }

    /**
     * Generate datatable
     *
     * @return Datatable
     */
    public function datatable()
    {
        return $this->frogService->makeDatatable();
    }

    /**
     * Update frog life status.
     *
     * @param Int $id
     * 
     * @return Redirect
     */
    public function status($id)
    {
        $this->frogService->status($id);
        return redirect('/frogs')->with('success', 'Frog Life Status Updated Successfully!');
    }

    /**
     * Delete frog.
     *
     * @param Int $id
     * @return Redirect
     */
    public function destroy($id)
    {
        $this->frogService->destroy($id);
        return redirect('/frogs')->with('success', 'Frog Deleted Successfully!');
    }
}
