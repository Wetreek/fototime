<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PropositionType
 * 
 * @property int $id
 * @property string $name
 * @property int $order
 * @property int $proposition_type
 * 
 * @property \Illuminate\Database\Eloquent\Collection $competition_propositions
 *
 * @package App\Models
 */
class PropositionType extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'order' => 'int',
		'proposition_type' => 'int'
	];

	protected $fillable = [
		'name',
		'order',
		'proposition_type'
	];

	public function competition_propositions()
	{
		return $this->hasMany(\App\Models\CompetitionProposition::class);
	}
}
