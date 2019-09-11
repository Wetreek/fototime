<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Fee
 * 
 * @property int $id
 * @property string $remark
 * @property int $fee_type
 * 
 * @property \Illuminate\Database\Eloquent\Collection $competitions
 * @property \Illuminate\Database\Eloquent\Collection $text_translates
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Fee extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'fee_type' => 'int'
	];

	protected $fillable = [
		'remark',
		'fee_type'
	];

	public function competitions()
	{
		return $this->belongsToMany(\App\Models\Competition::class, 'competition_fees')
					->withPivot('amount');
	}

	public function text_translates()
	{
		return $this->hasMany(\App\Models\TextTranslate::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'user_fees')
					->withPivot('id', 'competition_id', 'info_date');
	}
}
