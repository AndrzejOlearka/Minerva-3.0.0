<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Creators\Factory;
use App\Lib\Interfaces\Action as ActionType;

class TripsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $trip = Factory::action(ActionType::TRIP);
        $actionData = $trip->display();
        return view('trips', compact('actionData'));
    }

    public function create(Request $request)
    {
        $trip = Factory::action(ActionType::TRIP, $request);
        return $trip->start();
    }

    public function complete()
    {
        $trip = Factory::action(ActionType::TRIP);
        return $trip->finish();
    }

    public function show()
    {
        $trip = Factory::action(ActionType::TRIP);
        return $trip->check();
    }
}
