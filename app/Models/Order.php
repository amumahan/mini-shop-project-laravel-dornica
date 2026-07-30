<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\OrderStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 *
 * @property int $id
 * @property int $user_id
 * @property int $final_price
 * @property int $final_discount
 * @property int $status
 * @property int $total_products
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property Collection|OrderItem[] $orderItems
 *
 * @package App\Models
 */
class Order extends Model
{
	use SoftDeletes;
	protected $table = 'orders';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'final_price' => 'int',
		'final_discount' => 'int',
		'status' => OrderStatus::class,
		'total_products' => 'int'
	];

	protected $fillable = [
        'user_id',
        'user_province',
        'user_city',
        'final_price',
        'user_address',
        'total_products',
        'user_postal_code',
        'tracing_code',
        'user_phone',
        'status',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function orderItems()
	{
		return $this->hasMany(OrderItem::class);
	}

    #[Scope]
    protected function applySort(Builder $query): void
    {
        $request = request()->input('sort');
        switch ($request) {
            case 'price_high' :
            {
                $query->orderByDesc('final_price');
                break;
            }
            case 'price_low' :
            {
                $query->orderBy('final_price');
                break;
            }
            case 'created_at_asc' :
            {
                $query->orderBy('created_at');
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
