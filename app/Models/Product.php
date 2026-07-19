<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\ProductStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $qty
 * @property int $product_category_id
 * @property string $description
 * @property string|null $en_name
 * @property int $discount
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property ProductCategory $productCategory
 * @property Collection|OrderItem[] $orderItems
 * @property Collection|ProductImage[] $productImages
 *
 * @package App\Models
 */
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    public static $snakeAttributes = false;

    protected $casts = [
        'price' => 'int',
        'qty' => 'int',
        'product_category_id' => 'int',
        'discount' => 'int',
        'status' => ProductStatus::class
    ];

    protected $fillable = [
        'name',
        'price',
        'qty',
        'product_category_id',
        'description',
        'en_name',
        'discount',
        'status'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
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
            case 'best_selling' :
            {
                $query->orderByDesc('qty')
                    ->limit(1);
                break;
            }
            case 'lowest' :
            {
                $query->orderBy('price')
                    ->limit(1);
                break;
            }
            case 'highest' :
            {
                $query->orderByDesc('price')
                    ->limit(1);
                break;
            }
            default :
            {
                $query->orderByDesc('created_at');
                break;
            }

        }
    }

}
