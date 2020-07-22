<?php

namespace App\Http\Controllers;

use App\Lib\Creators\DailyReward;
use App\Lib\Transactions\Sale;
use App\Models\AdvancedMineral;
use App\Models\BasicMineral;
use App\Models\Setting;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('advance');
    }

    public function index(Request $request)
    {
        $minerals = [
            'basic' => BasicMineral::getBasicMinerals(),
            'advanced' => AdvancedMineral::getAdvancedMinerals(),
        ];
        $settings = [
            'basicMineralCost' => Setting::getSettingByName('basicMineralCost'),
            'advancedMineralCost' => Setting::getSettingByName('advancedMineralCost')
        ];
        return view('equipment', compact('minerals', 'settings'));
    }

    public function sell(Request $request)
    {
        return (new Sale($request))->sell();
    }
}
