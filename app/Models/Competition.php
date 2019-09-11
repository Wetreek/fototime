<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Competition
 * 
 * @property int $id
 * @property \Carbon\Carbon $valid_from
 * @property \Carbon\Carbon $valid_to
 * @property \Carbon\Carbon $closure
 * @property int $status
 * @property string $bank_account
 * @property string $iban_bank_account
 * @property int $check_ratio
 * @property int $rating_age_type
 * @property int $judge_age_type
 * @property string $notify_mails
 * 
 * @property \Illuminate\Database\Eloquent\Collection $fees
 * @property \Illuminate\Database\Eloquent\Collection $competition_judges
 * @property \Illuminate\Database\Eloquent\Collection $photo_ratios
 * @property \Illuminate\Database\Eloquent\Collection $competition_propositions
 * @property \Illuminate\Database\Eloquent\Collection $text_translates
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property \Illuminate\Database\Eloquent\Collection $user_fees
 *
 * @package App\Models
 */
class Competition extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'check_ratio' => 'int',
		'rating_age_type' => 'int',
		'judge_age_type' => 'int'
	];

	protected $dates = [
		'valid_from',
		'valid_to',
		'closure'
	];

	protected $fillable = [
		'valid_from',
		'valid_to',
		'closure',
		'status',
		'bank_account',
		'iban_bank_account',
		'check_ratio',
		'rating_age_type',
		'judge_age_type',
		'notify_mails'
	];

	public function fees()
	{
		return $this->belongsToMany(\App\Models\Fee::class, 'competition_fees')
					->withPivot('amount');
	}

	public function competition_judges()
	{
		return $this->hasMany(\App\Models\CompetitionJudge::class);
	}

	public function photo_ratios()
	{
		return $this->belongsToMany(\App\Models\PhotoRatio::class, 'competition_photo_ratios');
	}

	public function competition_propositions()
	{
		return $this->hasMany(\App\Models\CompetitionProposition::class);
	}

	public function text_translates()
	{
		return $this->hasMany(\App\Models\TextTranslate::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'user_competition_data')
					->withPivot('id', 'competition_data_id', 'info_date');
	}

	public function user_fees()
	{
		return $this->hasMany(\App\Models\UserFee::class);
	}
}
