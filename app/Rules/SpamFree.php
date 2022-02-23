<?php


namespace App\Rules;
use App\Inspections\Spam;

class SpamFree
{
    public function passes($attribute,$value)
    {
        try {
            return ! resolve(Spam::class)->detect($value);
        }catch (\Exception $e){
            return false;
        }
    }

    public function messages()
    {


        return [
            'body.spamfree' => '存在非法字符！！',

        ];
    }


}