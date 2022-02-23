<?php


namespace App;

trait Favoritable
{

    protected static function bootFavoritable()
    {
        static::deleting(function ($model) {
            $model->favorites->each->delete();
        });
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    /*
//我们使用 getFavoritesCountAttribute() 方法
//来为模型实例添加 favorites_count 属性：???????????*/
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class,'favorited');
    }

    public function favorite()
    {

        $attributes = ['user_id'=>auth()->id()];

        if (!$this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }

    }

    public function unfavorite()
    {
        $attributes = ['user_id' => auth()->id()];

        $this->favorites()->where($attributes)->get()->each->delete();
    }

    public function isFavorited()
    {
        return !! $this->favorites->where('user_id',auth()->id())->count();
//        -->注意此处，修改该后返回的类型是 bool 型
    }

   /* public function isFavorited()
    {
        return $this->favorites()->where('user_id',auth()->id())->exists();
    }*/

}
