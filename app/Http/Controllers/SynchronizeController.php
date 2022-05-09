<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SynchronizeController extends Controller
{
    public function currentDate($request)
    {
        if($request->session()->has('operation'))
        {
            return session('operation')->open_date;

        }else{
            return date('Y-m-d');
        }
    }
}
