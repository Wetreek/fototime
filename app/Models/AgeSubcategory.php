<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AgeSubcategory
 * 
 * @property int $id
 * @property string $age_description
 * @property int $age
 * 
 * @property \Illuminate\Database\Eloquent\Collection $photos
 * @property \Illuminate\Database\Eloquent\Collection $text_translates
 * @property \Illuminate\Database\Eloquent\Collection $user_competition_ages
 *
 * @package App\Models
 */
class AgeSubcategory extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'age' => 'int'
	];

	protected $fillable = [
		'age_description',
		'age'
	];

	public function photos()
	{
		return $this->hasMany(\App\Models\Photo::class, 'age_category_id');
	}

	public function text_translates()
	{
		return $this->hasMany(\App\Models\TextTranslate::class);
	}

	public function user_competition_ages()
	{
		return $this->hasMany(\App\Models\UserCompetitionAge::class, 'age_id');
	}
}
