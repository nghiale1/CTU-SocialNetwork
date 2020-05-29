<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $p_id
 * @property string $p_slug
 * @property string $p_title
 * @property string $p_content
 * @property string $p_view_count
 * @property Carbon $p_created
 * @property int $stu_id
 * @property int $sub_id
 * 
 * @property Student $student
 * @property Subject $subject
 * @property Collection|Comment[] $comments
 * @property Collection|Like[] $likes
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';
	protected $primaryKey = 'p_id';
	public $timestamps = false;

	protected $casts = [
		'stu_id' => 'int',
		'sub_id' => 'int'
	];

	protected $dates = [
		'p_created'
	];

	protected $fillable = [
		'p_slug',
		'p_title',
		'p_content',
		'p_view_count',
		'p_created',
		'stu_id',
		'sub_id'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'stu_id');
	}

	public function subject()
	{
		return $this->belongsTo(Subject::class, 'sub_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'p_id');
	}

	public function likes()
	{
		return $this->hasMany(Like::class, 'p_id');
	}
}
