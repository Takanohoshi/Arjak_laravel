<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('username', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
    
        $users = $users->paginate(5); // Adjust the number of items per page as needed
        
    
        return view('admin.users.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create | User';
        return view('admin.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:8', 'max:32', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'level' => ['required', Rule::in(['admin', 'petugas'])],
        ];

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'New User has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Edit | User';
        return view('admin.users.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
            'level' => ['required', Rule::in(['admin', 'petugas'])],
        ];

        if ($request->username != $user->username) {
            $rules['username'] = ['required', 'min:8', 'max:32', 'unique:users'];
        }

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $user->id)->update($validatedData);

        

        return redirect('/dashboard/users')->with('success', 'New User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'User has been deleted');
    }

}
