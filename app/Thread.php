<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\ThreadWasUpdated;
use App\Events\ThreadHasNewReply;
use App\Events\ThreadReceivedNewReply;

class Thread extends Model
{
    use RecordsActivity;
    //意味所有属性均可更新，后期会修复此安全隐患
    protected $guarded = [];

    /*  //对于自定义的全局作用域，
    //我们可以使用 withoutGlobalScope 为给定查询移除指定全局作用域。
    //而使用了 $with 属性，我们总是会获取关联的数据，并且无法移除。*/
    protected $with=['creator','channel'];
    protected $appends = ['isSubscribedTo'];

//访问器创建成功后，只需添加该属性到该模型的 appends 属性中
    public function getIsSubscribedToAttribute()
    {
        return $this->subscriptions()
            ->where('user_id',auth()->id())
            ->exists();
    }


    /*//Laravel 全局作用域
    //我们不仅想在 show 页面显示回复数量，
    //而且想在 index 页面也进行显示。
    //我们利用 Laravel 全局作用域 来实现。
    //匿名全局作用域#
    //$thread 多了一个 replies_count 属性*/
    protected static function booted()
    {
//        parent::boot();
        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies');
        });


        /*//利用 Eloquent 监控器 的 deleting 事件 来删除相关回复，而不是在控制器中删除：
        //你可以注册在触发各种模型事件时执行的闭包，而不使用自定义事件类。
        //通常，你应该在模型的 booted 方法中注册这些闭包：*/
        /*static::deleting(function ($thread) {
            $thread->replies()->delete();*/

       /* 我们把批量删除与话题关联的回复改为逐条删除，
        使得 Reply 模型的 deleting 事件被监听到，
        从而删除与该回复相关的动作流*/

        static::deleting(function ($thread) {

            $thread->replies->each->delete();
        });

    }

    public function path()
    {
        //return '/threads/'.$this->id;
        return "/threads/{$this->channel->slug}/{$this->id}";
    }


    /*//按照约定，Eloquent 将会使用 所属模型名称 (Thread)的 「snake case」形式，再加上 _id 后缀作为外键字段。
    //thread_id*/
    public function replies()
    {
        return $this->hasMany(Reply::class);

        /*//        既然我们已经利用 $with 属性为 Reply 模型预加载了 owner 和 favorites 属性
        //        //        那么我们从 Thread 模型关联 Reply 模型时就可以不用再次预加载
        //        //        ->withCount('favorites')
        //        //            ->with('owner');*/
    }


    /*//默认外键名是 Eloquent 依据关联名，
    //并在 关联名 后加上 _再加上主键字段名作为后缀确定的。
    //下面这个是指定的。。。。。。*/
    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /*//默认外键名是 Eloquent 依据关联名，
    //并在 关联名 后加上 _再加上主键字段名作为后缀确定的。*/
    public function channel()
    {
        return $this->belongsTo(Channel::class,'channel_id');
    }

    public function addReply($reply)
    {
//        dd($reply);
//        $this->replies()->create($reply);

        //??改成回复区改成vue组件 为何要加return？？-》调用这个函数需要一个返回值
//        return $this->replies()->create($reply);


        //设定的触发消息通知的时机是『订阅的话题有新的回复 』，，又改成这样
        $reply = $this->replies()->create($reply);



        //只有这种不报错。。不清楚问题所在
        //----理清了，一个反向关联未建立（$subscription->thread）
        /*foreach ($this->subscriptions as $subscription) {
            if($subscription->user_id != $reply->user_id) {
                $subscription->user->notify(new ThreadWasUpdated($this, $reply));
            }
        }*/


       /* $this->subscriptions
            ->where('user_id','!=',$reply->user_id)
            ->each
            ->notify($reply);*/


       /* $this->notifySubscribers($reply);*/

//        event(new ThreadHasNewReply($this,$reply));

        event(new ThreadReceivedNewReply($reply));

//        $this->notifySubscribers($reply);
        return $reply;
    }

    /*public function notifySubscribers($reply)
    {
        $this->subscriptions
            ->where('user_id','!=',$reply->user_id)
            ->each
            ->notify($reply);
    }*/



    /*//Laravel 本地作用域 。本地作用域允许我们定义通用的约束集合以便在应用中复用。
    //要定义这样的一个作用域，只需简单在对应 Eloquent 模型方法前加上一个 scope 前缀，作用域总是返回 查询构造器。
    //一旦定义了作用域，则可以在查询模型时调用作用域方法。在进行方法调用时不需要加上 scope 前缀。

    //不懂！！！！  scope*/

    public function scopeFilter($query, $filters)
    {
    //        dd($query);
    //        dd($filters);
        return $filters->apply($query);
    }

    public function subscribe( $userId=null )
    {
        $this->subscriptions()->create([
            'user_id' => $userId ?: auth()->id()
        ]);

        return $this;

    }

    public function unsubscribe($userId = null)
    {
        $this->subscriptions()
            ->where('user_id',$userId ?: auth()->id())
            ->delete();

    }

    public function subscriptions()
    {
        return $this->hasMany(ThreadSubscription::class);
    }

    public function hasUpdatesFor($user)
    {
        // Look in the cache for the proper key
        // compare that carbon instance with the $thread->updated_at

        $key = $user->visitedThreadCacheKey($this);

        return $this->updated_at > cache($key);
    }



}
