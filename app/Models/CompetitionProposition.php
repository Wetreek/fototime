<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompetitionProposition
 * 
 * @property int $id
 * @property string $proposition_text
 * @property int $proposition_type_id
 * @property int $lang_id
 * @property int $competition_id
 * 
 * @property \App\Models\Competition $competition
 * @property \App\Models\Language $language
 * @property \App\Models\PropositionType $proposition_type
 *
 * @package App\Models
 */
class CompetitionProposition extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'proposition_type_id' => 'int',
		'lang_id' => 'int',
		'competition_id' => 'int'
	];

	protected $fillable = [
		'id',
		'proposition_text'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'lang_id');
	}

	public function proposition_type()
	{
		return $this->belongsTo(\App\Models\PropositionType::class);
	}
}
