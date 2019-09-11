<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string $userpwd
 * @property int $lock_account
 * @property string $fname
 * @property string $lname
 * @property string $title_academic
 * @property string $title_photo
 * @property int $birth_year
 * @property string $email
 * @property string $phone
 * @property string $street
 * @property string $city
 * @property string $postal_code
 * @property int $country_id
 * @property \Carbon\Carbon $register_request_date
 * @property int $register_status
 * @property int $user_role
 * @property int $change_pwd
 * @property int $error_pwd_cnt
 * 
 * @property \App\Models\Country $country
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $competition_judges
 * @property \Illuminate\Database\Eloquent\Collection $photo_ratings
 * @property \Illuminate\Database\Eloquent\Collection $photos
 * @property \Illuminate\Database\Eloquent\Collection $competitions
 * @property \Illuminate\Database\Eloquent\Collection $fees
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use Notifiable;

	public $timestamps = false;

	protected $casts = [
		'lock_account' => 'int',
		'birth_year' => 'int',
		'country_id' => 'int',
		'register_status' => 'int',
		'user_role' => 'int',
		'change_pwd' => 'int',
		'error_pwd_cnt' => 'int'
	];

	protected $dates = [
		'register_request_date'
	];

	protected $fillable = [
		'username',
		'userpwd',
		'lock_account',
		'fname',
		'lname',
		'title_academic',
		'title_photo',
		'birth_year',
		'email',
		'phone',
		'street',
		'city',
		'postal_code',
		'country_id',
		'register_request_date',
		'register_status',
		'user_role',
		'change_pwd',
		'error_pwd_cnt'
	];

	public function country()
	{
		return $this->belongsTo(\App\Models\Country::class);
	}

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'user_role');
	}

	public function competition_judges()
	{
		return $this->hasMany(\App\Models\CompetitionJudge::class);
	}

	public function photo_ratings()
	{
		return $this->hasMany(\App\Models\PhotoRating::class);
	}

	public function photos()
	{
		return $this->hasMany(\App\Models\Photo::class);
	}

	public function competitions()
	{
		return $this->belongsToMany(\App\Models\Competition::class, 'user_competition_data')
					->withPivot('id', 'competition_data_id', 'info_date');
	}

	public function fees()
	{
		return $this->belongsToMany(\App\Models\Fee::class, 'user_fees')
					->withPivot('id', 'competition_id', 'info_date');
	}

	// Overridden from Authenticable class
	public function getAuthPassword()
	{
		return $this->userpwd;
	}

	// Method to self lock user
	public function lockUser()
	{
		$this->lock_account = 1;
		$this->save();
	}
	public function unlockUser()
	{
		$this->lock_account = 0;
		$this->save();
	}

	// Retrieve user error count
	public function getUserErrorCount()
	{
		return $this->error_pwd_cnt;
	}

	public function isAdmin()
	{
		if($this->user_role == 4){
			return true;
		} else {
			return false;
		}
	}
}
