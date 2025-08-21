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
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $created_by
 * 
 * @property User $user
 * @property Collection|Sale[] $sales
 *
 * @package App\Models
 */
class Business extends Model
{
	protected $table = 'business';

	protected $casts = [
		'created_by' => 'int'
	];

	protected $fillable = [
		'name',
		'type',
		'created_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function sales()
	{
		return $this->hasMany(Sale::class);
	}
}
