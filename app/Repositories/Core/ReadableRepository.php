<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\Core\IReadableRepository;
use App\Traits\Repositories\TReadable;

class ReadableRepository extends BaseRepository implements IReadableRepository
{
    use TReadable;
}
