<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 11:22:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompetitionAttachment
 * 
 * @property int $id
 * @property int $competition_id
 * @property string $dir
 * @property string $filename
 * @property string $name
 * @property string $description
 * @property int $attachment_type
 *
 * @package App\Models
 */
class CompetitionAttachment extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competition_id' => 'int',
		'attachment_type' => 'int'
	];

	protected $fillable = [
		'competition_id',
		'dir',
		'filename',
		'name',
		'description',
		'attachment_type'
	];
}
