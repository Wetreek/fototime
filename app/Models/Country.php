<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $country
 * @property string $country_iso
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Country extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'country',
		'country_iso'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
