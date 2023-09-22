<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Core\CrudRepository;

class UserRepository extends CrudRepository implements IUserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
