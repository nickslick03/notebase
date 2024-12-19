<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $role
 * @property string $name
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'role';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'role');
	}
}
