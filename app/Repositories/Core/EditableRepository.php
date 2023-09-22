<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\Core\IEditableRepository;
use App\Traits\Repositories\TEditable;

class EditableRepository extends BaseRepository implements IEditableRepository
{
    use TEditable;
}
