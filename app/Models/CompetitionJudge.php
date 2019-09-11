<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompetitionJudge
 * 
 * @property int $user_id
 * @property int $competition_id
 * 
 * @property \App\Models\Competition $competition
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class CompetitionJudge extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'competition_id' => 'int'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
