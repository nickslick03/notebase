<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Resource
 * 
 * @property int $resource
 * @property string $filename
 * @property string $filetype
 * @property string $data
 * @property string $title
 * @property string $description
 * @property int $user_author
 * @property int $course
 * @property int $status
 * @property int|null $chapter
 * 
 * @property User $user
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Resource extends Model
{
	protected $table = 'resource';
	protected $primaryKey = 'resource';
	public $timestamps = false;

	protected $casts = [
		'user_author' => 'int',
		'course' => 'int',
		'status' => 'int',
		'chapter' => 'int'
	];

	protected $fillable = [
		'filename',
		'filetype',
		'data',
		'title',
		'description',
		'user_author',
		'course',
		'status',
		'chapter'
	];

	public function chapter()
	{
		return $this->belongsTo(Chapter::class, 'chapter');
	}

	public function course()
	{
		return $this->belongsTo(Course::class, 'course');
	}

	public function status()
	{
		return $this->belongsTo(Status::class, 'status');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_author');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'starred_resource_user', 'resource', 'user')
					->withPivot('starred_resource_user');
	}
}
