<?php

namespace App;

use Facade\Ignition\Tests\Support\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reply extends Model
{
    //
    use Favoritable,RecordsActivity;
    protected $guarded = [];
    protected $with = ['owner','favorites'];
    //使用 序列化 的方式，添加一个在数据库中没有对应字段的属性。
    //要使用序列化，首先你需要为这个值定义一个 访问器。
    //访问器创建成功后，只需添加该属性到该模型的 appends 属性中
    protected $appends = ['favoritesCount','isFavorited','creat_at'];

    public function owner()
    {

        return $this->belongsTo(User::class,'user_id');// 使用 user_id 字段进行模型关联

    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

//gt – 判断第一个日期是否比第二个日期大。不知为何报错，直接用>大于号判断。。>>左边时间格式改成那个diffForHumans那格式了。。。
//忘了在哪转换的格式了。
//解决。。。
    public function wasJustPublished()
    {
        return $this->created_at ->gt( Carbon::now()->subMinute());
//        return $this->getOriginal('created_at');
//        return $this->created_at;
//        return Carbon::now()->subMinute(1);
    }

    public function mentionedUsers()
    {
        preg_match_all('/\@([^\s\.]+)/',$this->body,$matches);

        return $matches[1];
    }


    public function path()
    {
        return $this->thread->path()."#reply{$this->id}";
    }

//测试在Reply2.vue中调用timer 以实现$reply->created_at->diffForHumans() 这个格式时间显示
//成功啦！！
//用到 Eloquent: 修改器 ,来格式化显示时间的格式
    public function getCreatAtAttribute()
    {

        return  Carbon::parse($this->created_at)->diffForhumans();
//        return Carbon::parse($v)->diffForHumans();

    }

    public function setBodyAttribute($body)
    {
        $this->attributes['body'] = preg_replace('/\@([^\s\.]+)/','<a href="/profiles/$1">$0</a>',$body);
    }

}
