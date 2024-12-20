<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $user
 * @property string $username
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $access_code
 * @property int $role
 * @property string $first_name
 * @property string $last_name
 * 
 * @property Collection|Course[] $courses
 * @property Collection|Resource[] $resources
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'user';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'access_code' => 'int',
		'role' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'access_code',
		'role',
		'first_name',
		'last_name'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'role');
	}

	public function courses()
	{
		return $this->belongsToMany(Course::class, 'associated_course_user', 'user', 'course')
					->withPivot('associated_course_user');
	}

	public function resources()
	{
		return $this->belongsToMany(Resource::class, 'starred_resource_user', 'user', 'resource')
					->withPivot('starred_resource_user');
	}
}
