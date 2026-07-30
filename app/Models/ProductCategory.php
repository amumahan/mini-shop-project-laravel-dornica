<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class ProductCategory extends Model
{
	protected $table = 'product_categories';
	public static $snakeAttributes = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_active'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}



    #[Scope]
    protected function applySort(Builder $query): void
    {
        $request = request()->input('sort');
        switch ($request) {
            case 'name_asc' :
            {
                $query->orderBy('name')
                    ->limit(5);
                break;
            }
            case 'name_desc' :
            {
                $query->orderByDesc('name')
                    ->limit(5);
                break;
            }
            case 'date_asc' :
            {
                $query->orderBy('created_at')
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
                'name',
            ],'LIKE',"%$search%");
        }
    }
}
