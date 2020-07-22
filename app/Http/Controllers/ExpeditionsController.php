<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Creators\Factory;
use App\Lib\Interfaces\Action as ActionType;

class ExpeditionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $expedition = Factory::action(ActionType::EXPEDITION);
        $actionData = $expedition->display();
        return view('expeditions', compact('actionData'));
    }

    public function create(Request $request)
    {
        $expedition = Factory::action(ActionType::EXPEDITION, $request);
        return $expedition->start();
    }

    public function complete()
    {
        $expedition = Factory::action(ActionType::EXPEDITION);
        return $expedition->finish();
    }

    public function show()
    {
        $expedition = Factory::action(ActionType::EXPEDITION);
        return $expedition->check();
    }
}
