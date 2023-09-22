<?php

namespace App\Repositories\Core;

use Illuminate\Database\Eloquent\Model;

class BaseRepository {
    public function __construct(protected Model $model)
    {
    }
}
