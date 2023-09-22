<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\Core\ICrudRepository;
use App\Traits\Repositories\TEditable;
use App\Traits\Repositories\TReadable;

class CrudRepository extends BaseRepository implements ICrudRepository
{
    use TEditable;
    use TReadable;
}
