<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $status
 * @property string $type
 * 
 * @property Collection|Resource[] $resources
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'status';
	protected $primaryKey = 'status';
	public $timestamps = false;

	protected $fillable = [
		'type'
	];

	public function resources()
	{
		return $this->hasMany(Resource::class, 'status');
	}
}
