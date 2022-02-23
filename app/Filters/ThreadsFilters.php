<?php


namespace App\Filters;
use App\User;
use Illuminate\Http\Request;
use App\Filters\Filters;


class ThreadsFilters extends Filters
{

    protected $filters = ['by','unanswered','popularity'];


    //重构的我都晕了。。。。。。。⬇️
    /*public function apply($builder)
    {
        $this->builder=$builder;

//        if(! $username = $this->request->by) return $builder;

//        $user = User::where('name',$username)->firstOrfail();

//        return $builder->where('user_id',$user->id);

        if ($this->request->has('by')) {
            $this->by($this->request->by);

        }
        return  $this->builder;

//        return $this->by($username);
    }*/

    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrfail();
        return $this->builder->where('user_id', $user->id);
    }

    public function popularity()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'desc');
    }

    public function unanswered()
    {
        //用where('replies_count',0);查询会报字段不存在的错，，用having查询。。可以，不知为何
        return $this->builder->having('replies_count',0);
    }
}
