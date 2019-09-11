<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AgeSubcategoriesCategory
 * 
 * @property int $category_id
 * @property int $age_id
 *
 * @package App\Models
 */
class AgeSubcategoriesCategory extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'age_id' => 'int'
	];
}
