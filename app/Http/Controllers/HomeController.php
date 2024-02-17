<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latestCars = Car::latest()->take(6)->get();
        $latestTest = Testimonial::latest()->take(3)->get();
        return view('index',compact('latestCars','latestTest'));

    }
}
