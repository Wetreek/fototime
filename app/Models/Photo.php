<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Photo
 * 
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $age_category_id
 * @property int $allowed
 * @property string $photo_name
 * @property string $photo_description
 * @property string $dirname
 * @property string $filename
 * @property string $filename_original
 * @property string $filename_prefix
 * @property \Carbon\Carbon $added
 * @property \Carbon\Carbon $approved
 * @property string $photo_place
 * @property string $photo_gps
 * @property int $photo_ratio_id
 * @property string $approver
 * @property string $rand_str
 * @property string $photo_print_flag
 * @property string $additional_award_text
 * 
 * @property \App\Models\AgeSubcategory $age_subcategory
 * @property \App\Models\Category $category
 * @property \App\Models\PhotoRatio $photo_ratio
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $awards
 * @property \Illuminate\Database\Eloquent\Collection $photo_ratings
 *
 * @package App\Models
 */
class Photo extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'category_id' => 'int',
		'age_category_id' => 'int',
		'allowed' => 'int',
		'photo_ratio_id' => 'int'
	];

	protected $dates = [
		'added',
		'approved'
	];

	protected $fillable = [
		'user_id',
		'category_id',
		'age_category_id',
		'allowed',
		'photo_name',
		'photo_description',
		'dirname',
		'filename',
		'filename_original',
		'filename_prefix',
		'added',
		'approved',
		'photo_place',
		'photo_gps',
		'photo_ratio_id',
		'approver',
		'rand_str',
		'photo_print_flag',
		'additional_award_text'
	];

	public function age_subcategory()
	{
		return $this->belongsTo(\App\Models\AgeSubcategory::class, 'age_category_id');
	}

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function photo_ratio()
	{
		return $this->belongsTo(\App\Models\PhotoRatio::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function awards()
	{
		return $this->belongsToMany(\App\Models\Award::class, 'photo_awards');
	}

	public function photo_ratings()
	{
		return $this->hasMany(\App\Models\PhotoRating::class);
	}
}
