<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseView
 * 
 * @property int $course
 * @property string $subject_code
 * @property string $course_code
 * @property string $title
 *
 * @package App\Models
 */
class CourseView extends Model
{
	protected $table = 'course_view';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'course' => 'int'
	];

	protected $fillable = [
		'course',
		'subject_code',
		'course_code',
		'title'
	];
}
