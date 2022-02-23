<?php


namespace App\Inspections;



class Spam
{
    protected $inspections = [
        KeyHeldDown::class,
        InvalidKeywords::class,

    ];


    public function detect($body)
    {
        foreach ($this->inspections as $inspection){
            app($inspection)->detect($body);
        }

        return false;
    }

    /*public function detect($body)
    {
        $this->detectInvalidKeywords($body);
        $this->detectKeyHeldDown($body);

        return false;
    }*/

    /*public function detectInvalidKeywords($body)
    {
        $invalidKeywords = ['{{','}}'];

        foreach ($invalidKeywords as $invalidKeyword) {
            if (stripos($body, $invalidKeyword) !== false) {
                throw new \Exception('Your reply contains spam.');
            }
        }
    }*/


//    为何protected  ,,还有这正则不懂
    /*protected function detectKeyHeldDown($body)
    {
        if(preg_match('/(.)\\1{4,}/',$body)){
            throw new \Exception('Your reply contains spam.');
        }
    }*/

}