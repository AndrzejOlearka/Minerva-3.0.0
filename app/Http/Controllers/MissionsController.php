<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Creators\Factory;
use App\Lib\Interfaces\Action as ActionType;

class MissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $missions = Factory::action(ActionType::MISSION);
        $actionData = $missions->display();
        return view('missions', compact('actionData'));
    }

    public function complete(Request $request)
    {
        $missions = Factory::action(ActionType::MISSION, $request);
        return $missions->complete();
    }
}
