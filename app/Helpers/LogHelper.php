<?php  

namespace App\Helpers;
use App\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use App\Models\Business;

class LogHelper{
 public static  function log($action,$recordId,$oldData,$newData){

        $oldData = self::transformData($oldData);
        $newData = self::transformData($newData);

    ActivityLogs::create([
        'user_id'    => Auth::id(),
        'action'     => $action,
        'record_id'  => $recordId,
        'old_data'   => $oldData ? json_encode($oldData) : null,
        'new_data'   => $newData ? json_encode($newData) : null,
        'ip_address' => Request::ip(),
    ]);
 }
 private static function transformData($data)
 {
     if (!$data) return null;

     // Convert object → array
     if (is_object($data)) {
         $data = $data->toArray();
     }

     // Replace IDs with actual names
     if (isset($data['user_id'])) {
         $data['user_name'] = User::find($data['user_id'])->name ?? 'Unknown';
     }

     if (isset($data['business_id'])) {
         $data['business_name'] = Business::find($data['business_id'])->name ?? 'Unknown';
     }

     return $data;
 }
}

