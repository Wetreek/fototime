<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserCompetitionAge
 * 
 * @property int $user_id
 * @property int $competition_id
 * @property int $age_id
 * 
 * @property \App\Models\AgeSubcategory $age_subcategory
 * @property \App\Models\Competition $competition
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class UserCompetitionAge extends Eloquent
{
	protected $table = 'user_competition_age';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'competition_id' => 'int',
		'age_id' => 'int'
	];

	public function age_subcategory()
	{
		return $this->belongsTo(\App\Models\AgeSubcategory::class, 'age_id');
	}

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
