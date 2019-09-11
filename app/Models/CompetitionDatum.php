<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompetitionDatum
 * 
 * @property int $id
 * @property int $additional_constant
 * 
 * @property \Illuminate\Database\Eloquent\Collection $text_translates
 * @property \Illuminate\Database\Eloquent\Collection $user_competition_data
 *
 * @package App\Models
 */
class CompetitionDatum extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'additional_constant' => 'int'
	];

	protected $fillable = [
		'additional_constant'
	];

	public function text_translates()
	{
		return $this->hasMany(\App\Models\TextTranslate::class, 'competition_data_id');
	}

	public function user_competition_data()
	{
		return $this->hasMany(\App\Models\UserCompetitionDatum::class, 'competition_data_id');
	}
}
