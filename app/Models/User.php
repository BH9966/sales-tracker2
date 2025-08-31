<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property int|null $created_by
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Collection|AssignBusiness[] $assign_businesses
 * @property Collection|Business[] $businesses
 * @property Collection|Sale[] $sales
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';

	protected $casts = [
		'created_by' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'role',
		'created_by',
		'remember_token'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function assign_businesses()
	{
		return $this->hasMany(AssignBusiness::class);
	}

	public function businesses()
	{
		return $this->hasMany(Business::class, 'created_by');
	}

	public function sales()
	{
		return $this->hasMany(Sale::class);
	}

	public function users()
	{
		return $this->hasMany(User::class, 'created_by');
	}
}
