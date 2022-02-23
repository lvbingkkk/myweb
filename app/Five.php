<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Five extends Model
{
    public function getRouteKeyName()
    {
        return 'title';
    }
}
