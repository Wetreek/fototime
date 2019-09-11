<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompetitionCompetitionDatum
 * 
 * @property int $competition_id
 * @property int $competition_data_id
 *
 * @package App\Models
 */
class CompetitionCompetitionDatum extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'competition_id' => 'int',
		'competition_data_id' => 'int'
	];

	protected $fillable = [
		'competition_id',
		'competition_data_id'
	];
}
