<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subject
 * 
 * @property int $subject
 * @property string $code
 * @property string $name
 * 
 * @property Collection|Course[] $courses
 *
 * @package App\Models
 */
class Subject extends Model
{
	protected $table = 'subject';
	protected $primaryKey = 'subject';
	public $timestamps = false;

	protected $fillable = [
		'code',
		'name'
	];

	public function courses()
	{
		return $this->hasMany(Course::class, 'subject');
	}
}
