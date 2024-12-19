<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chapter
 * 
 * @property int $chapter
 * @property int $course
 * @property string $title
 * 
 * @property Collection|Resource[] $resources
 *
 * @package App\Models
 */
class Chapter extends Model
{
	protected $table = 'chapter';
	protected $primaryKey = 'chapter';
	public $timestamps = false;

	protected $casts = [
		'course' => 'int'
	];

	protected $fillable = [
		'course',
		'title'
	];

	public function course()
	{
		return $this->belongsTo(Course::class, 'course');
	}

	public function resources()
	{
		return $this->hasMany(Resource::class, 'chapter');
	}
}
