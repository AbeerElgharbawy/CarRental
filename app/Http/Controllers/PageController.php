<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Testimonial;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function index()
    {
        $latestCars = Car::latest()->take(6)->get();
        $latestTest = Testimonial::latest()->take(3)->get();
        return view('index',compact('latestCars','latestTest'));

    }
    public function contact(){
        return view('contact');
    }
    public function blog(){
        return view('blog');
    }
    public function single(string $id){
        $car=Car::findOrFail($id);
        $categories=Category::get();
        $carCounts = Car::select('category_id', DB::raw('COUNT(*) as count'))
            ->groupBy('category_id')
            ->get();
        return view('single', compact('car','categories','carCounts'));
    }
    
    public function listing(){
        $cars=Car::paginate(3);
        $latestTest = Testimonial::latest()->take(3)->get();
        return view('listing',compact('cars','latestTest'));
    }
    public function testimonials(){
        $testimonials=Testimonial::get();
        return view('testimonials',compact('testimonials'));
    }
    public function about(){
        return view('about');
    }
   
}
