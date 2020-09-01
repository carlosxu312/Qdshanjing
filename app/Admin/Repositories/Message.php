<?php

namespace App\Admin\Repositories;

use App\Model\Message as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Message extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
