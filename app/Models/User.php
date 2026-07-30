<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\UserStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticate;

/**
 * Class User
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
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class User extends Authenticate
{
	protected $table = 'users';

    use SoftDeletes;
	public static $snakeAttributes = false;

	protected $casts = [
//		'mobile' => 'int',
		'status' => UserStatus::class
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'mobile',
		'email',
		'password',
		'status'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}


    #[Scope]
    protected function applyFilter(Builder $query): void
    {
        $request = request();
        if ($request->filled('exists')) {
            $query->where('qty', '>', 0);
        }
        if ($request->filled('category_id')) {
            $categoryId = array_keys($request->input('category_id'));
            $query->whereIn('product_category_id', $categoryId);

        }
    }

    #[Scope]
    protected function applySort(Builder $query): void
    {
        $request = request()->input('sort');
        switch ($request) {
            case 'name_asc' :
            {
                $query->orderBy('first_name')
                    ->orderBy('last_name')
                    ->limit(5);
                break;
            }
            case 'name_desc' :
            {
                $query->orderByDesc('first_name')
                    ->orderBy('last_name')
                    ->limit(5);
                break;
            }
            default :
            {
                $query->orderByDesc('created_at');
                break;
            }

        }
    }

    #[Scope]
    protected function applySearch(Builder $query): void
    {
        $request = request();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereAny([
                'first_name',
                'last_name',
            ],'LIKE',"%$search%");
        }
    }
}
