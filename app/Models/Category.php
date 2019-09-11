<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property int $competition_id
 * @property int $min_height
 * @property int $min_width
 * @property int $max_height
 * @property int $max_width
 * @property int $competitive_flag
 * @property int $user_photos
 * @property string $category_alias
 * @property int $accept_points
 * @property int $check_ratio
 * 
 * @property \Illuminate\Database\Eloquent\Collection $photos
 * @property \Illuminate\Database\Eloquent\Collection $text_translates
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competition_id' => 'int',
		'min_height' => 'int',
		'min_width' => 'int',
		'max_height' => 'int',
		'max_width' => 'int',
		'competitive_flag' => 'int',
		'user_photos' => 'int',
		'accept_points' => 'int',
		'check_ratio' => 'int'
	];

	protected $fillable = [
		'competition_id',
		'min_height',
		'min_width',
		'max_height',
		'max_width',
		'competitive_flag',
		'user_photos',
		'category_alias',
		'accept_points',
		'check_ratio'
	];

	public function photos()
	{
		return $this->hasMany(\App\Models\Photo::class);
	}

	public function text_translates()
	{
		return $this->hasMany(\App\Models\TextTranslate::class);
	}
}
