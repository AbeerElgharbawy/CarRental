<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Traits\Common;

use function PHPUnit\Framework\returnSelf;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials=Testimonial::get();
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addTestimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => 'required',
            'position' => 'required',
            'content' => 'required',
            'published' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]
        );
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
        $data['published']=isset($request->published);
        Testimonial::create($data);
        return redirect('admin/testimonials');
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
        $testimonial=Testimonial::findOrFail($id);
        return view('admin.editTestimonials', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([         
            'name' => 'required',
            'position' => 'required',
            'content' => 'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            ]);
            $data['published']=isset($request->published);
            if(isset($request->image)){
                $file=$request->image;
                $fileName=$this->uploadFile($file,'assets/images');
                $data['image']=$fileName;   
            }
            Testimonial::where('id',$id)->update($data);
            return redirect('admin/testimonials');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id',$id)->delete();
        return redirect('admin/testimonials');
    }
}
