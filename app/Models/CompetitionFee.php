<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompetitionFee
 * 
 * @property int $competition_id
 * @property int $fee_id
 * @property float $amount
 * 
 * @property \App\Models\Competition $competition
 * @property \App\Models\Fee $fee
 *
 * @package App\Models
 */
class CompetitionFee extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'competition_id' => 'int',
		'fee_id' => 'int',
		'amount' => 'float'
	];

	protected $fillable = [
		'amount'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class);
	}

	public function fee()
	{
		return $this->belongsTo(\App\Models\Fee::class);
	}
}
