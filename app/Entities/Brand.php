<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Brand.
 *
 * @package namespace App\Entities;
 */
class Brand extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_brand');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
