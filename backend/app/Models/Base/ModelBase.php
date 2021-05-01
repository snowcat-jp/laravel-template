<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SoftDelete;
use App\Models\Traits\Author;

class ModelBase extends Model
{
    use SoftDelete;
    use Author;

    const CREATED_AT = 'create_datetime';
    const UPDATED_AT = 'update_datetime';
    const DELETED_AT = 'delete_datetime';
}
