<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWeather;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    /**
     * The weather service instance.
     * 
     */
    private $weatherService;

    /**
     * Create a new controller instance.
     *
     * @param WeatherService $weatherService
     * @return void
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->middleware('auth');

        $this->weatherService = $weatherService;
    }

    /**
     * Show a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('weather.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('weather.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreWeather $request
     * @return Redirect
     */
    public function store(StoreWeather $request)
    {
        $this->weatherService->store($request->all());
        return redirect('/weather')->with('success', 'Weather Updated Successfully!');
    }


    /**
     * Generate datatable
     *
     * @return Datatable
     */
    public function datatable()
    {
        return $this->weatherService->makeDatatable();
    }
}
