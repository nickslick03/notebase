<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * 
 * @property int $course
 * @property string $code
 * @property string $title
 * @property int $subject
 * 
 * @property Collection|User[] $users
 * @property Collection|Chapter[] $chapters
 * @property Collection|Resource[] $resources
 *
 * @package App\Models
 */
class Course extends Model
{
	protected $table = 'course';
	protected $primaryKey = 'course';
	public $timestamps = false;

	protected $casts = [
		'subject' => 'int'
	];

	protected $fillable = [
		'code',
		'title',
		'subject'
	];

	public function subject()
	{
		return $this->belongsTo(Subject::class, 'subject');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'associated_course_user', 'course', 'user')
					->withPivot('associated_course_user');
	}

	public function chapters()
	{
		return $this->hasMany(Chapter::class, 'course');
	}

	public function resources()
	{
		return $this->hasMany(Resource::class, 'course');
	}
}
