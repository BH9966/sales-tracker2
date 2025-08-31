<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::with('user')->paginate(10);

        // Pass data to view
        return view('mazerpage.usepage.user', compact('users'));

    }

    /**
     * 
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
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:6|confirmed',  
            'role'        => 'required',
        ], [
            'password.confirmed' => 'Passwords do not match!'
        ]);

        
        // $exists = User::where('email', $request->email)->where('name',$request->name)->exists();

        // if ($exists) {
            
        //     return redirect()->back()->with('error', 'User already exists.');
        // }
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('errors', 'Passwords do not match!');
        }
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'   => $request->role,
            'created_by'  => Auth::user()->id
        ]);

    
        return redirect()->back()->with('success', 'User added successfully.');
        
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
        $user = User::findOrFail($id);

   
    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role'  => 'required|in:super_admin,admin,user',
    ]);

    
    if ($request->password || $request->password_confirmation) {
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('passerror', 'Password and confirm password do not match.');
        }

        if (strlen($request->password) < 6) {
            return redirect()->back()->with('passworderror', 'Password must be at least 6 characters.');
        }

       
        $user->password = Hash::make($request->password);
    }

  
    if ($request->email !== $user->email) {
        $exists = User::where('email', $request->email)->exists();
        if ($exists) {
            return redirect()->back()->with('email_error', 'Email already taken by another user.');
        }
    }

   
    $user->name  = $request->name;
    $user->email = $request->email;
    $user->role  = $request->role;
    $user->created_by = Auth::user()->id;
    $user->save();

    return redirect()->back()->with('success_user', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
