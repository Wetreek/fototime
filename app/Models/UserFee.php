<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserFee
 * 
 * @property int $id
 * @property int $user_id
 * @property int $fee_id
 * @property int $competition_id
 * @property \Carbon\Carbon $info_date
 * 
 * @property \App\Models\Competition $competition
 * @property \App\Models\Fee $fee
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class UserFee extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int',
		'fee_id' => 'int',
		'competition_id' => 'int'
	];

	protected $dates = [
		'info_date'
	];

	protected $fillable = [
		'id',
		'info_date'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class);
	}

	public function fee()
	{
		return $this->belongsTo(\App\Models\Fee::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
