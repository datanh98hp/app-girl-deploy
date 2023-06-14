<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Girl.
 *
 * @package namespace App\Entities;
 */
class Girl extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'girls';
    protected $primaryKey = 'id';

    public $timestamps = true;

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
