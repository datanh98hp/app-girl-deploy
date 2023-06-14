<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Photo.
 *
 * @package namespace App\Entities;
 */
class Photo extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    protected $table = 'photo';
    protected $primaryKey = 'id';

    public $timestamps = true;

    public function girl(){
        return $this->belongsTo(Photo::class);
    }

}
