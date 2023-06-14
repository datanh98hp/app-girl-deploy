<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Category.
 *
 * @package namespace App\Entities;
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_category');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class,'category_brand');
    }
    public function children()
    {
        return $this->hasMany($this,'parent_id',"id");
    }
    public function parent()
    {
        return $this->belongsTo($this,'parent_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_category');
    }
}
