<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::get(); 
        return view('admin.users', compact('users')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $messages=$this->messages();
        $data=$request->validate([
            'fullname'=>'required|string|max:50',
            'username'=>'required|string|max:50',
            'email' => 'required',
            'password'=>'required',
            'active' => 'nullable',
            ]);
        $data['password'] = Hash::make($data['password']);
        $data['active']=isset($request->active);
        User::create($data);
        // $user->forceFill(['email_verified_at'=>now(),])->save();
        return redirect('admin/users')->with('success', 'User added successfully.');

        // return redirect('users');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user=User::findOrFail($id);
        // return view('admin.includes.editUser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'fullname'=>'required|string|max:50',
            'username'=>'required|string|max:50',
            'email'=>'required|string',
        ]);
        $data['active']=isset($request->active);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        User::where('id',$id)->update($data);
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
