<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;
class AuditLog extends Controller
{
    //
    public function AuditLogs($descript,$changes)
    {
       
        // 'old_data',
        // 'new_data',
        // 'description'
         
        ActivityLogs::create([
       // 'user_id'   => auth()->id(),       
            'action'    => json_encode($changes),           
            'description'=>$descript,           
            'old_data'   => json_encode($changes), 
            'ip_address'=> request()->ip(),   
            
        ]);
    }
}
