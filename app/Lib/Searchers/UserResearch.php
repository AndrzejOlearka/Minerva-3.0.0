<?php

namespace App\Lib\Searchers;

use App\Models\User;

class UserResearch extends AbstractSearcher 
{
    protected bool $matchedValues = false;

    protected bool $similarValues = false;

    protected bool $noneValues = false;

    protected object $model;

    const NONE_USERS_FOUND = 0;

    const SEARCHED_USER_FOUND = 1;

    const SIMILAR_USERS_FOUND = 2;

    public function __construct()
    {
        $this->model = new User();
    }

    public function process()
    {
        $matchedValuesResearch = $this->searchMatchedValues();
        if($matchedValuesResearch){
            return $this;
        } 
        $similarValuesResearch = $this->searchSimilarValues();
        if($similarValuesResearch){
            return $this;
        } 
        $this->noneValues = true;
        return $this;
    }

    public function searchMatchedValues()
    {
        $result = $this->model::where('user', $this->query)->first();
        if($result)
        {
            $this->matchedValues = true;
            $this->result = $result;
            return true;
        }
        return false;
    }

    public function searchSimilarValues()
    {
        $result = $this->model::where('user', 'like', "%{$this->query}%")->take(10)->get();
        if($result->count() > 0)
        {
            $this->similarValues = true;
            $this->result = $result;
            return true;
        }
        return false;
    }

    public function responseByResult()
    {
        if($this->matchedValues)
        {
            $this->setStatus(self::SEARCHED_USER_FOUND);
        }
        if($this->similarValues)
        {
            $this->setStatus(self::SIMILAR_USERS_FOUND);
        }
        if($this->noneValues)
        {
            $this->setStatus(self::NONE_USERS_FOUND);
        }
        return $this;
    }
}