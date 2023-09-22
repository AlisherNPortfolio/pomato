<?php

namespace App\Repositories\Contracts\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IReadableRepository
{
    public function find(int $id): ?Model;

    public function all(): Collection;

    public function paginate($perPage = 20): Collection;
}
