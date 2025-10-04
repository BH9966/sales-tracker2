<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Business;
class ActivityLogs extends Model
{
    
    protected $fillable = [
        'user_id',
        'action',
        'ip_address',
        'old_data',
        'new_data',
        'description'
	];
  protected $casts = [
    'new_data' => 'array',
    'old_data' => 'array',
];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function  business()
    {
      return $this->belongsTo(Business::class);
    }



    public function getReadableNewDataAttribute()
    {
      $data = $this->new_data;

    // ensure $data is array
    if (is_string($data)) {
        $data = json_decode($data, true) ?? [];
    }

    if (!is_array($data)) {
        $data = []; // fallback if decoding fails
    }

        $userId = data_get($data, 'user_id');
        $businessId = data_get($data, 'business_id');
    
        $data['user'] = $userId ? optional(User::find($userId))->name : null;
        $data['business'] = $businessId ? optional(Business::find($businessId))->name : null;
    
        unset($data['user_id'], $data['business_id']);
    

      return $data;
    }


    public function getReadableOldDataAttribute()
    {
      $data = $this->new_data;

    // ensure $data is in  array format.....
    if (is_string($data)) {
        $data = json_decode($data, true) ?? [];
    }

    if (!is_array($data)) {
        $data = []; 
    }

        $userId = data_get($data, 'user_id');
        $businessId = data_get($data, 'business_id');
    
        $data['user'] = $userId ? optional(User::find($userId))->name : null;
        $data['business'] = $businessId ? optional(Business::find($businessId))->name : null;
    
        unset($data['user_id'], $data['business_id']);
    

    return $data;
    }
}
