<?php
namespace App\Repositories\Impl;

use App\Tag;
use App\Repositories\TagRepository;
use App\Repositories\Eloquent\EloquentRepository;

class TagRepositoryImpl extends EloquentRepository  implements TagRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Tag::class;
        return $model;
    }


}
