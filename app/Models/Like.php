<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 * 
 * @property int $p_id
 * @property int $stu_id
 * 
 * @property Post $post
 * @property Student $student
 *
 * @package App\Models
 */
class Like extends Model
{
	protected $table = 'likes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'p_id' => 'int',
		'stu_id' => 'int'
	];

	public function post()
	{
		return $this->belongsTo(Post::class, 'p_id');
	}

	public function student()
	{
		return $this->belongsTo(Student::class, 'stu_id');
	}
}
