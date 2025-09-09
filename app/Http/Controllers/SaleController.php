<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SalesExport;

use Maatwebsite\Excel\Facades\Excel;
class SaleController extends Controller
{
    /**
     * 
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user=User::all();
        $busness =Business::all();
        $value= Sale::with('business','user')->paginate(10);
        return view('mazerpage.sales.sales',compact('value','user','busness'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function invoice()
    {
        //
    $data=Sale::with('business','user')->get();
    $pdf = Pdf::loadView('mazerpage.invoice.salesinvoice', compact('data'));
    return $pdf->download('saleinvoice.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
   
    
     public function store(Request $request)
{
    $request->validate([
        'muuzaji'      => 'required|integer',
        'biashara'     => 'required|integer',
        'tarehe_mauzo' => 'required|date',
        'mauzo'        => 'required|numeric',
        'garama'       => 'nullable|numeric',
        'maelezo'      => 'nullable|string',
        'cash_jana'    => 'nullable|numeric',
    ]);
    
    $businessId = $request->biashara;
    $userId     = $request->muuzaji;
    
    
    $isRegistered = DB::table('assign_business') 
        ->where('user_id', $userId)
        ->where('business_id', $businessId)
        ->exists();
    
    if (! $isRegistered) {
        return redirect()->back()->with('errors', "Huyu muuzaji hajahusishwa na biashara uliyochagua.");
    }
    
   
    $saleExists = Sale::where('business_id', $businessId)
        ->where('user_id', $userId)
        ->where('sale_date', $request->tarehe_mauzo)
        ->exists();
    
    if ($saleExists) {
        return redirect()->back()->with('error', "Sale record on this date already exists.");
    }
   
    $lastSale = Sale::where('business_id', $businessId)
        ->where('user_id', $userId)
        ->orderBy('sale_date', 'desc')
        ->first();
        $cashLeoLastSale = ($lastSale->total_sales - $lastSale->cost) + $lastSale->cash_mkononi_jana;

        if ($lastSale && $request->cash_jana != $cashLeoLastSale) {
            return redirect()->back()->with('error', "Cash ya jana haifanani! Iliyoandikwa jana: {$lastSale->cash_mkononi_jana}, Cash Leo ya mwisho: {$cashLeoLastSale}, uliyoweka sasa: {$request->cash_jana}");
        }
    // if ( $lastSale->cash_mkononi_jana != $request->cash_jana) {
    //     return redirect()->back()->with('error', "Cash ya jana haifanani! Iliyoandikwa jana: {$lastSale->cash_mkononi_jana}, uliyoweka sasa: {$request->cash_jana}");
    // }
    Sale::create([
        'business_id'       => $businessId,
        'user_id'           => $userId,
        'sale_date'         => $request->tarehe_mauzo,
        'total_sales'       => $request->mauzo,
        'cost'              => $request->garama,
        'cost_description'  => $request->maelezo,
        'cash_mkononi_jana' => $request->cash_jana,
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
        $sale = Sale::findOrFail($id);

   
        $request->validate([
            'muuzaji'      => 'required|string',
            'biashara'   => 'required|string',
            'tarehe_mauzo'       => 'required|date',
            'mauzo'          => 'required|numeric',
            'garama'           => 'nullable|numeric',
            'maelezo'  => 'nullable|string',
            'cash_jana'      => 'nullable|numeric',
        ]);



        $businessType = $request->biashara;

   
        if ($businessType === 'CarWash') {
            $request->validate([
                'mauzo' => 'required|numeric',
            ]);
        } elseif ($businessType === 'Genge') {
            $request->validate([
                'mauzo' => 'required|numeric',
            ]);
        }
       
        $saleExists = Sale::where('business_id', $businessType)
            ->where('user_id', $request->muuzaji)
            ->where('sale_date', $request->tarehe_mauzo)
            ->exists();
    
        if ($saleExists) {
            return redirect()->back()->with('error', "Sale record on this date already exists.");
        }
    
        $lastSale = Sale::where('business_id', $businessType)
            ->where('user_id', $request->muuzaji)
            ->orderBy('sale_date', 'desc')
            ->first();
    
        if ($lastSale) {

            // if($request->biashara == 'Genge' || $request->biashara == 'Car wash' || $request->biashara == 'Supermarket'){
    
                if ($lastSale->cash_mkononi_jana != $request->cash_jana) {
                    return redirect()->back()->with('error', "Cash ya jana haifanani! Iliyoandikwa jana: {$lastSale->cash_mkononi_jana}, uliyoweka sasa: {$request->cash_jana}");
                }
            // }   
            
        }
                $sale->business_id  = $request->biashara;
                $sale->user_id = $request->muuzaji;
                $sale->sale_date  = $request->tarehe_mauzo;
                $sale->total_sales  = $request->mauzo;
                $sale->cost  = $request->garama;
                $sale->cost_description  = $request->maelezo;
                $sale->cash_mkononi_jana  = $request->cash_jana;
                $sale->save();
    }


// Export excel file.....


    public function exportSalesExcel()
{
     
    return Excel::download(new SalesExport, 'sales_report.xlsx');
}
    /**
     * Remove the specified resource from storage.
     * 
     * 
     */
    public function destroy(string $id)
    {
        //
        $sales = Sale::findOrFail($id);
        $sales->delete();
    
        return redirect()->back()->with('success', 'Sale deleted successfully!');
    }
}
