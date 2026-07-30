<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\AdminStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
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


    #[Scope]
    protected function applySort(Builder $query): void
    {
        $request = request()->input('sort');
        switch ($request) {
            case 'name_asc' :
            {
                $query->orderBy('full_name');
                break;
            }
            case 'name_desc' :
            {
                $query->orderByDesc('full_name');
                break;
            }
            case 'email' :
            {
                $query->orderByDesc('email');
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
                'full_name',
                'email',
                'user_name',
            ], 'LIKE', "%$search%");
        }
    }




}
