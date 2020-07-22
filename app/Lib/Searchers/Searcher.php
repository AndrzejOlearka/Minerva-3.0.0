<?php

namespace App\Lib\Searchers;

use App\Lib\Searchers\AbstractSearcher;

class Searcher
{
    public function __call($key, $value)
    {
        $this->query = $value[0];
        return $this;
    }

    public function __get($key)
    {
        $model = "App\\Lib\\Searchers\\$key";
        return (new $model)->setQuery($this->query);
    }
}