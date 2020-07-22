<?php

namespace App\Lib\Searchers;

abstract class AbstractSearcher 
{
    protected $query;

    protected $result;

    protected $status;

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function getQuery($query)
    {
        return $this->query;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getResultJSON()
    {
        return response()->json([
            'status' => $this->getStatus(),
            'result' => $this->getResult()
        ]);
    }
}