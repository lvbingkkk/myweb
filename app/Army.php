<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
//    protected $guarded = [];

//    protected $table = 'armies';
    public function getRouteKeyName()
    {
        return 'title';
    }
}
