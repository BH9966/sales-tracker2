<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class BusnessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $types = Business::select('type')->distinct()->get();
        $users=User::all();
        $data=User::with('businesses')->get();
        return view('mazerpage.busness.busness',compact('data','users'));
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
       
        $request->validate([
            'name'    => 'required|string|max:255',
            'busness' => 'required|string',
            'user'    => 'required|exists:users,id',
        ]);
    
        $busness = $request->busness;
        $user    = $request->user;
        $exists = Business::where('type', $busness)
                          ->where('created_by', $user)
                          ->exists();
    
        if ($exists) {
            return redirect()->back()->with('error', 'This business already taken by this user');
        }
    
        // insert new record
        Business::create([
            'name'    => $request->name,
            'type'    => $busness,
            'created_by' => $user
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
        $user = User::with('businesses')->findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'business_name' => $user->businesses->first()->name ?? '',
            'type' => $user->businesses->type,
            'name' => $user->name,
            
            
        ]);
    }
                           

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'business' => 'required|string',
            'user'=>'required'
        ]);
    
        $busness = Business::findOrFail($request->id);
        $busness->name = $request->name;
        $busness->type = $request->business;
        $busness->created_by = $request->user;
        $busness->save();
    
        return redirect()->back()->with('success', 'User Business updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
