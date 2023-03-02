<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class HomeController extends Controller
{
    /**
     * The weather service instance.
     * 
     */
    private $weatherService;


    /**
     * Create a new controller instance.
     * 
     * @param WeatherRepositoryInterface $weather
     * @return void
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {
        return view('home', [
           'weather' => $this->weatherService->latest()
        ]);
    }
}
