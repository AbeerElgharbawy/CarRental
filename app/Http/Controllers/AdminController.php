<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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

    //users
    public function addUser(){
        return view('admin/addUser');
    }
    public function users(){
        return view('admin/users');
    }
    public function editUser(){
        return view('admin/editUser');
    }
    //cars
    public function addCar(){
        return view('admin/addCar');
    }
    public function cars(){
        return view('admin/cars');
    }
    public function editCar(){
        return view('admin/editCar');
    }
    //categories
    public function addCategory(){
        return view('admin/addCategory');
    }
    public function categories(){
        return view('admin/categories');
    }
    public function editCategory(){
        return view('admin/editCategory');
    }
    //testimonials
    public function addTestimonials(){
        return view('admin/addTestimonials');
    }
    public function testimonials(){
        return view('admin/testimonials');
    }
    public function editTestimonial(){
        return view('admin/editTestimonials');
    }
    //Messaages
    public function messages(){
        return view('admin/messages');
    }
    public function showMessage(){
        return view('admin/showMessage');
    }
}
