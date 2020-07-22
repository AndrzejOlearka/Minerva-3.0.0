<?php

namespace App\Lib\Creators;

use App\Lib\Interfaces\Debt;
use App\Lib\Interfaces\Action;

final class Factory
{
    public static function action($type, $request = null): Action
    {
        $className = Action::NAMESPACE.'\\'.ucfirst($type);
        $class = new $className($type, $request);
        return $class;
    }

    public static function debt($type, $request = null): Debt
    {
        $className = Action::NAMESPACE.'\\'.ucfirst($type);
        $class = new $className($type, $request);
        return $class;
    }
}