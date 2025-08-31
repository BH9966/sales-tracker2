<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Business
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Collection|AssignBusiness[] $assign_businesses
 * @property Collection|Sale[] $sales
 *
 * @package App\Models
 */
class Business extends Model
{
	protected $table = 'businesses';

	protected $casts = [
		'created_by' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'created_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function assign_businesses()
	{
		return $this->hasMany(AssignBusiness::class);
	}

	public function sales()
	{
		return $this->hasMany(Sale::class);
	}
}
