<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Language
 * 
 * @property int $id
 * @property string $language
 * 
 * @property \Illuminate\Database\Eloquent\Collection $competition_propositions
 * @property \Illuminate\Database\Eloquent\Collection $text_translates
 *
 * @package App\Models
 */
class Language extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'language'
	];

	public function competition_propositions()
	{
		return $this->hasMany(\App\Models\CompetitionProposition::class, 'lang_id');
	}

	public function text_translates()
	{
		return $this->hasMany(\App\Models\TextTranslate::class, 'lang_id');
	}
}
