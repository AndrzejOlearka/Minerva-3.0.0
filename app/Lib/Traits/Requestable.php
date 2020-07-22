<?php

namespace App\Lib\Traits;

use Illuminate\Http\Request;

trait Requestable
{
    public \Illuminate\Http\Request $request;

    public function setRequest($request)
    {
        if(empty($request)){
            $this->request = new Request();

        } else {
            $this->request = $request;
        }
        return $this;
    }
}