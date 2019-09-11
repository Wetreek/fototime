<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompetitionPhotoRatio
 * 
 * @property int $competition_id
 * @property int $photo_ratio_id
 * 
 * @property \App\Models\Competition $competition
 * @property \App\Models\PhotoRatio $photo_ratio
 *
 * @package App\Models
 */
class CompetitionPhotoRatio extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'competition_id' => 'int',
		'photo_ratio_id' => 'int'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class);
	}

	public function photo_ratio()
	{
		return $this->belongsTo(\App\Models\PhotoRatio::class);
	}
}
