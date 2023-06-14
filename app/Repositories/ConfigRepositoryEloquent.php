<?php

namespace App\Repositories;

use App\Entities\Config;
use App\Entities\Widget;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Validators\SettingValidator;

/**
 * Class SettingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConfigRepositoryEloquent extends BaseRepository implements SettingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Config::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
