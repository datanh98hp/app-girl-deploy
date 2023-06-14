<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GirlRepository;
use App\Entities\Girl;
use App\Validators\GirlValidator;

/**
 * Class GirlRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GirlRepositoryEloquent extends BaseRepository implements GirlRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Girl::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
