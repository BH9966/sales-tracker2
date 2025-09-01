<?php

namespace App\Http\Controllers;

use App\Models\AssignBusiness;
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

        $data=Business::with('user')->paginate(10);
        return view('mazerpage.busness.busness',compact('data'));
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
            'busness_name'    => 'required|string|max:255',
            'description' => 'required|string',
            
        ]);
    
        $busness = $request->busness_name;
        $descript    = $request->description;
        $exists = Business::where('name', $busness)
                          ->exists();
    
        if ($exists) {
            return redirect()->back()->with('error', 'This business already registered');
        }
        
        Business::create([
            'name'    =>$busness ,
            'description'  => $descript,
            'created_by' => Auth::check() ? Auth::id() : null
        ]);
    
        return redirect()->back()->with('success', 'Busness added successfully.');
    }


    public function usersbusness()
    {
        //
        $busness=Business::all();
        $users= User::all();
        $datas=AssignBusiness::with('business','user')->paginate(10);
        return view('mazerpage.busness.usersbusness', compact('datas','users','busness'));

    }
    // delete usersbusness

    public function usersbusnessDestroy(string $id)
    {
        //
        $assign = AssignBusiness::findOrFail($id);
        $assign->delete();
    
        return redirect()->back()->with('success', 'UsersBusness deleted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function assign(Request $request)
    {
        //
        $request->validate([
            'busness'    => 'required|string',
            'user' => 'required|string',
            
        ]);
    
        $busness = $request->busness;
        $user    = $request->user;
        $exists = AssignBusiness::where('business_id', $busness)
                            ->where('user_id',$user)
                          ->exists();
    
        if ($exists) {
            return redirect()->back()->with('error', 'This user already assign to this bussnes');
        }
    
        // insert new record
        AssignBusiness::create([
            'business_id'    =>$busness ,
            'user_id'  => $user,
            'registered_by' => Auth::user()->id
        ]);
    
        return redirect()->back()->with('success', 'User Assigned successfully..');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // //
        // // $user = User::with('businesses')->findOrFail($id);

        // // return response()->json([
        // //     'id' => $user->id,
        // //     'business_name' => $user->businesses->first()->name ?? '',
        // //     'type' => $user->businesses->type,
        // //     'name' => $user->name,
            
        
        // ]);
    }
                   
    
    public function updateUserBusness(Request $request, string $id){


        $userBusness = Business::findOrFail($id);

        $request->validate([
            'busness'    => 'required|string',
            'user' => 'required|string',
            
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $busness = Business::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        
        $exists = Business::where('name', $request->name)
                          ->where('id', '!=', $id) 
                          ->exists();
        
        if ($exists) {
            return redirect()->back()->with('error', 'This business is already registered');
        }
        
        $busness->name        = $request->name;
        $busness->description = $request->description;
        $busness->created_by  = Auth::check() ? Auth::id() : null;
        $busness->save();
        
        return redirect()->back()->with('success', 'Business updated successfully!');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $business = Business::findOrFail($id);
        $business->delete();
    
        return redirect()->back()->with('success', 'Business deleted successfully!');
    }
}
