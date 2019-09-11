<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Award
 * 
 * @property int $id
 * @property int $priority
 * @property int $category_id
 * 
 * @property \Illuminate\Database\Eloquent\Collection $photos
 * @property \Illuminate\Database\Eloquent\Collection $text_translates
 *
 * @package App\Models
 */
class Award extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'priority' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'priority',
		'category_id'
	];

	public function photos()
	{
		return $this->belongsToMany(\App\Models\Photo::class, 'photo_awards');
	}

	public function text_translates()
	{
		return $this->hasMany(\App\Models\TextTranslate::class);
	}
}
