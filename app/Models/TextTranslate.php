<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TextTranslate
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $competition_id
 * @property int $category_id
 * @property int $lang_id
 * @property int $competition_data_id
 * @property int $age_subcategory_id
 * @property int $fee_id
 * @property int $award_id
 * @property string $user_text1
 * @property string $user_text2
 * @property string $user_text3
 * 
 * @property \App\Models\AgeSubcategory $age_subcategory
 * @property \App\Models\Award $award
 * @property \App\Models\Category $category
 * @property \App\Models\CompetitionDatum $competition_datum
 * @property \App\Models\Competition $competition
 * @property \App\Models\Fee $fee
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class TextTranslate extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competition_id' => 'int',
		'category_id' => 'int',
		'lang_id' => 'int',
		'competition_data_id' => 'int',
		'age_subcategory_id' => 'int',
		'fee_id' => 'int',
		'award_id' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'competition_id',
		'category_id',
		'lang_id',
		'competition_data_id',
		'age_subcategory_id',
		'fee_id',
		'award_id',
		'user_text1',
		'user_text2',
		'user_text3'
	];

	public function age_subcategory()
	{
		return $this->belongsTo(\App\Models\AgeSubcategory::class);
	}

	public function award()
	{
		return $this->belongsTo(\App\Models\Award::class);
	}

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function competition_datum()
	{
		return $this->belongsTo(\App\Models\CompetitionDatum::class, 'competition_data_id');
	}

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class);
	}

	public function fee()
	{
		return $this->belongsTo(\App\Models\Fee::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'lang_id');
	}
}
