<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\AdminStatus;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;

/**
 * Class Admin
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $mobile
 * @property string $email
 * @property string $password
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Admin extends User
{
	protected $table = 'admins';
	public static $snakeAttributes = false;

	protected $casts = [
		'mobile' => 'string',
		'status' => AdminStatus::class,
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'full_name',
		'user_name',
		'mobile',
		'email',
		'password',
		'status'
	];
}
