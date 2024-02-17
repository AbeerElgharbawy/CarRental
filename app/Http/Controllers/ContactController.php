<?php

namespace App\Http\Controllers;

use App\Mail\contact_mail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact_mail(Request $request){
        $data=$request->validate([
            'fname'=>'required|string|max:100',
            'lname'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'message'=>'required|string|max:100',
        ]);
        Mail::to('abeerrahmed88@gmail.com')->send(new contact_mail($request));
        Contact::create($data);
        return redirect('contact');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages=Contact::get();
        return view('admin.messages', compact('messages'));
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message=Contact::findOrFail($id);
        $message->is_read = 1;
        $message->save();
        return view('admin.showMessage', compact('message'));
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
        Contact::where('id',$id)->delete();
        return redirect('admin/messages');
    }
}
