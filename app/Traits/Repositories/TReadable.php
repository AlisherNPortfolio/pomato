<?php

namespace App\Traits\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait TReadable
{
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function all(): Collection
    {
        return $this->model->get();
    }

    public function paginate($perPage = 20): Collection
    {
        return $this->model->paginate($perPage);
    }
}
