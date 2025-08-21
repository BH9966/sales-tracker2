<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Sale;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $value= Sale::with('business','user')->get();
        return view('mazerpage.sales.sales',compact('value'));
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
        'user_type'      => 'required|string',
        'busness_type'   => 'required|string',
        'saledate'       => 'required|date',
        'sales'          => 'required|numeric',
        'cost'           => 'nullable|numeric',
        'cost_descript'  => 'nullable|string',
        'cash_jana'      => 'nullable|numeric',
    ]);

    $businessType = $request->busness_type;

   
    if ($businessType === 'CarWash') {
        $request->validate([
            'sales' => 'required|numeric',
        ]);
    } elseif ($businessType === 'Genge') {
        $request->validate([
            'sales' => 'required|numeric',
        ]);
    }
   
    $saleExists = Sale::where('business_id', $businessType)
        ->where('user_id', $request->user_type)
        ->where('sale_date', $request->saledate)
        ->exists();

    if ($saleExists) {
        return redirect()->back()->with('error', "Sale record on this date already exists.");
    }

    $lastSale = Sale::where('business_id', $businessType)
        ->where('user_id', $request->user_type)
        ->orderBy('sale_date', 'desc')
        ->first();

    if ($lastSale) {
        if ($lastSale->cash_mkononi_jana != $request->cash_jana) {
            return redirect()->back()->with('error', "Cash ya jana haifanani! Iliyoandikwa jana: {$lastSale->cash_mkononi_jana}, uliyoweka sasa: {$request->cash_jana}");
        }
    }

 
    Sale::create([
        'business_id'         => $businessType,
        'user_id'             => $request->user_type,
        'sale_date'           => $request->saledate,
        'total_sales'         => $request->sales,
        'cost'                => $request->cost,
        'cost_description'    => $request->cost_descript,
        'cash_mkononi_jana'   => $request->cash_jana,
    ]);

    return redirect()->back()->with('success', "Sale added successfully.");
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
}
