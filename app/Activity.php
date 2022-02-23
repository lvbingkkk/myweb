<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //Add [user_id] to fillable property to allow mass assignment on [App\Activity].
    protected $guarded=[];

    public function subject()
    {
        return $this->morphTo();
    }

    public static function feed($user,$take = 50)
    {
        /*return $user->activity()->latest()->with('subject')->take($take)->get()->groupBy(function ($activity) {
            return $activity->created_at->format('Y-m-d');
        });*/

        return static::where('user_id',$user->id)
            ->latest()
            ->with('subject')
            ->take($take)
            ->get()
            ->groupBy(function ($activity) {
               return $activity->created_at->format('Y-m-d');
            });
    }


}
