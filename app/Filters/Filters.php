<?php


namespace App\Filters;
use Illuminate\Http\Request;


abstract class Filters
{
    protected $request,$builder;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
//        dd($builder);

        $this->builder = $builder;

/*//        dd($this->filters);

//        foreach ( $this->filters as $filter) {
//
////            dd($filter);
//
//            if (!$this->hasFilter($filter)) return;
//
////            dd($this->$filter);
////            dd($this->request);
////            dd($this->request->$filter);
//
//
//            //下面这个 $this->$filter(); 不懂。。。。懂了$filter是个方法都名-by。。
//           $this->$filter($this->request->$filter);
////           dd($data);
//
//        }
//        dd($this->builder);*/

        foreach ($this->getFilters() as $filter => $value){

//            dd($this->getFilters());
            if(method_exists($this,$filter)){  // 注：此处是 hasFilter() 方法的重构
//                dd($this->$filter($value));
                $this->$filter($value);
            }
        }
        return $this->builder;

    }

//    protected function hasFilter($filter)
//    {
//        return method_exists($this, $filter) && $this->request->has($filter);
//    }

    public function getFilters()
    {
//        dd($this->request->only($this->filters));
        return $this->request->only($this->filters);
    }
}
