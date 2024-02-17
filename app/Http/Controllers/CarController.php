<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;


class CarController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::paginate(4);
        return view('admin.cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('admin.addCar', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:200',
            'luggage' => 'required',
            'doors' => 'required',
            'price' => 'required',
            'passengers' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]);
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image']= $fileName;
            $data['published']=isset($request->published);
            Car::create($data);
            return redirect('admin/cars');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $car=Car::findOrFail($id);
        // return view('single', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::get();
        $car=Car::findOrFail($id);
        return view('admin.editCar', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
        'title' => 'required|max:50',
        'description' => 'required|max:200',
        'luggage' => 'required',
        'doors' => 'required',
        'price' => 'required',
        'passengers' => 'required',
        'category_id' => 'required',
        'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        if(isset($request->image)){
            $file=$request->image;
            $fileName=$this->uploadFile($file,'assets/images');
            $data['image']=$fileName;   
        }  
        // $fileName = $this->uploadFile($request->image, 'assets/images');
        // $data['image']= $fileName;
        // $data['published']=isset($request->active);
        Car::where('id',$id)->update($data);
        return redirect('admin/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        return redirect('admin/cars');
    }
}