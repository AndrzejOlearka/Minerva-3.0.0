<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Creators\Factory;
use App\Lib\Interfaces\Action as ActionType;

class MinesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $mines = Factory::action(ActionType::MINE);
        $actionData = $mines->display();
        return view('mines', compact('actionData'));
    }

    public function add(Request $request)
    {
        $mines = Factory::action(ActionType::MINE, $request);
        return $mines->add();
    }
}
