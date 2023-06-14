<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LoveImage extends Model
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
