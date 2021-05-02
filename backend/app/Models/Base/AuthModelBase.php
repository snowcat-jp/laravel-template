<?php

namespace App\Models\Base;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\SoftDelete;
use App\Models\Traits\Author;

class AuthModelBase extends Authenticatable
{
    use SoftDelete;
    use Author;

    const CREATED_AT = 'create_datetime';
    const UPDATED_AT = 'update_datetime';
    const DELETED_AT = 'delete_datetime';
}
