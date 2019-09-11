<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ApplicationLog
 * 
 * @property int $id
 * @property string $level
 * @property int $priority
 * @property string $message
 * @property \Carbon\Carbon $created
 * @property string $get_vars
 * @property string $post_vars
 * @property string $ip
 * @property string $user_agent
 * @property string $action
 * @property string $controller
 * @property string $module
 * @property int $user_id
 * @property string $user_name
 * @property int $audit_code
 *
 * @package App\Models
 */
class ApplicationLog extends Eloquent
{
	protected $table = 'application_log';
	public $timestamps = false;

	protected $casts = [
		'priority' => 'int',
		'user_id' => 'int',
		'audit_code' => 'int'
	];

	protected $dates = [
		'created'
	];

	protected $fillable = [
		'level',
		'priority',
		'message',
		'created',
		'get_vars',
		'post_vars',
		'ip',
		'user_agent',
		'action',
		'controller',
		'module',
		'user_id',
		'user_name',
		'audit_code'
	];
}
