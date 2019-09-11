<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PhotoRating
 * 
 * @property int $user_id
 * @property int $photo_id
 * @property int $rating
 * 
 * @property \App\Models\Photo $photo
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class PhotoRating extends Eloquent
{
	protected $table = 'photo_rating';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'photo_id' => 'int',
		'rating' => 'int'
	];

	protected $fillable = [
		'rating'
	];

	public function photo()
	{
		return $this->belongsTo(\App\Models\Photo::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
