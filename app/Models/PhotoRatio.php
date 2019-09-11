<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PhotoRatio
 * 
 * @property int $id
 * @property int $height
 * @property int $width
 * @property float $tolerance
 * 
 * @property \Illuminate\Database\Eloquent\Collection $competitions
 * @property \Illuminate\Database\Eloquent\Collection $photos
 *
 * @package App\Models
 */
class PhotoRatio extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'height' => 'int',
		'width' => 'int',
		'tolerance' => 'float'
	];

	protected $fillable = [
		'height',
		'width',
		'tolerance'
	];

	public function competitions()
	{
		return $this->belongsToMany(\App\Models\Competition::class, 'competition_photo_ratios');
	}

	public function photos()
	{
		return $this->hasMany(\App\Models\Photo::class);
	}
}
