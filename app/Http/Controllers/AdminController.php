<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sales=Sale::all();
        $busness=Business::all();
        $user=User::all();
        return view('mazerpage.dashboard',compact('sales','busness','user'));
    }

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
        $value =$request->all();
        $test=Auth::guard('users')->attempt(['email'=>$value['email'],'password'=>$value['password']]);
    
        if($test){
            
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error_message', 'Invalid email or password');
        }
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
    public function destroy()
    {
        //
        Auth::guard('users')->logout();
        return redirect()->route('login');
    }
}
