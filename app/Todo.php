<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use UsesUuid;
}
