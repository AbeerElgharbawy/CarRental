<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(3);
        return view('admin.categories', compact('categories'));
    }
    // public function ToCar()
    // {
    //     $categories=Category::get();
    //     return view('admin.addCar', compact('categories'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'category'=>'required|string|max:100',
        ]);
        Category::create($data);
        return redirect('admin/categories');
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
        $category=Category::findOrFail($id);
        return view('admin.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'category'=>'required|string|max:100',
        ]);
        Category::where('id',$id)->update($data);
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
    
    // Check if the category has any related cars
    if ($category->cars()->exists()) {
        return redirect()->back()->with('error', 'Cannot delete category. It is related to cars.');
    }
    // Delete the category if no related cars exist
    $category->delete();
    return redirect()->route('categories')->with('success', 'Category deleted successfully.');

    // return redirect('admin/categories')->back()->with('success', 'Category deleted successfully.');

    }
    
}
