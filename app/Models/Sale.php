<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * 
 * @property int $id
 * @property int $business_id
 * @property int $user_id
 * @property Carbon $sale_date
 * @property float $total_sales
 * @property float|null $cost
 * @property string|null $cost_description
 * @property float|null $cash_mpya
 * @property float|null $cash_mkononi_jana
 * @property float|null $cash_mkononi_leo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Business $business
 * @property User $user
 *
 * @package App\Models
 */
class Sale extends Model
{
	protected $table = 'sales';

	protected $casts = [
		'business_id' => 'int',
		'user_id' => 'int',
		'sale_date' => 'datetime',
		'total_sales' => 'float',
		'cost' => 'float',
		'cash_mpya' => 'float',
		'cash_mkononi_jana' => 'float',
		'cash_mkononi_leo' => 'float'
	];

	protected $fillable = [
		'business_id',
		'user_id',
		'sale_date',
		'total_sales',
		'cost',
		'cost_description',
		'cash_mpya',
		'cash_mkononi_jana',
		'cash_mkononi_leo'
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
