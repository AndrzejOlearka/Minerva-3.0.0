<?php

namespace App\Lib\Repositories;


use App\Models\User;
use App\Models\Guild;
use App\Lib\Traits\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Lib\Helpers\Validators\Validator as ValidatorHelper;
use App\Lib\Traits\SettingsTrait;
use App\Models\MarketOffer;
use App\Models\MarketTransaction;

class MarketRepository
{
    use UserData;
    use SettingsTrait;

    public function __construct()
    {
        $this->setUserId();
    }

    public function getMinerals(){
        return array_merge($this->getSettings('basicMineralCost'), $this->getSettings('advancedMineralCost'));
    }

    public function getOwnOffers()
    {
        return MarketOffer::with('transactions')
            ->where('user_id', $this->userId)
            ->whereNull('deleted_at')
            ->get();
    }

    public function getOthersOffers()
    {
        return MarketOffer::where('user_id', '!=', $this->userId)
            ->whereNull('deleted_at')
            ->paginate(12);
    }

    public function getLastTransactions()
    {
        return MarketTransaction::where('user_id', $this->userId)
            ->orderBy('updated_at', 'desc')
            ->limit(12)
            ->get();
    }

    public function deleteOffer($id)
    {
        return MarketOffer::find($id)
            ->delete();
    }
}