<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserView
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
 * @property string $role_name
 *
 * @package App\Models
 */
class UserView extends Model
{
	protected $table = 'user_view';
	public $incrementing = false;

	protected $casts = [
		'user' => 'int',
		'email_verified_at' => 'datetime',
		'access_code' => 'int',
		'role' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'user',
		'username',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'access_code',
		'role',
		'first_name',
		'last_name',
		'role_name'
	];
}
