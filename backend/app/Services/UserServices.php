<?php

namespace App\Services;


use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function formatRequestParams($params)
    {
        $params['password'] = Hash::make($params['password']??'');
        return $params;
    }
}