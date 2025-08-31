<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssignBusiness
 * 
 * @property int $id
 * @property int $business_id
 * @property int $user_id
 * @property int|null $registered_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Business $business
 * @property User $user
 *
 * @package App\Models
 */
class AssignBusiness extends Model
{
	protected $table = 'assign_business';

	protected $casts = [
		'business_id' => 'int',
		'user_id' => 'int',
		'registered_by' => 'int'
	];

	protected $fillable = [
		'business_id',
		'user_id',
		'registered_by'
	];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
