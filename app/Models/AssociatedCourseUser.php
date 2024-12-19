<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssociatedCourseUser
 * 
 * @property int $associated_course_user
 * @property int $course
 * @property int $user
 * 
 *
 * @package App\Models
 */
class AssociatedCourseUser extends Model
{
	protected $table = 'associated_course_user';
	protected $primaryKey = 'associated_course_user';
	public $timestamps = false;

	protected $casts = [
		'course' => 'int',
		'user' => 'int'
	];

	protected $fillable = [
		'course',
		'user'
	];

	public function course()
	{
		return $this->belongsTo(Course::class, 'course');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user');
	}
}
