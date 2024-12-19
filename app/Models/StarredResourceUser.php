<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StarredResourceUser
 * 
 * @property int $starred_resource_user
 * @property int $resource
 * @property int $user
 * 
 *
 * @package App\Models
 */
class StarredResourceUser extends Model
{
	protected $table = 'starred_resource_user';
	protected $primaryKey = 'starred_resource_user';
	public $timestamps = false;

	protected $casts = [
		'resource' => 'int',
		'user' => 'int'
	];

	protected $fillable = [
		'resource',
		'user'
	];

	public function resource()
	{
		return $this->belongsTo(Resource::class, 'resource');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user');
	}
}
