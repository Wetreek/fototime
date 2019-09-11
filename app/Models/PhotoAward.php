<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PhotoAward
 * 
 * @property int $photo_id
 * @property int $award_id
 * 
 * @property \App\Models\Award $award
 * @property \App\Models\Photo $photo
 *
 * @package App\Models
 */
class PhotoAward extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'photo_id' => 'int',
		'award_id' => 'int'
	];

	public function award()
	{
		return $this->belongsTo(\App\Models\Award::class);
	}

	public function photo()
	{
		return $this->belongsTo(\App\Models\Photo::class);
	}
}
