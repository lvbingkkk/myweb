<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Notifications\ThreadWasUpdated;

class ThreadSubscription extends Model
{
    //设置可更新属性：,否则批量赋值错误
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function notify($reply)
    {
        $this->user->notify(new ThreadWasUpdated($this->thread,$reply));
    }

}
