<?php

namespace App\Lib\Traits;

use App\Models\AdvancedMineral;
use App\Models\BasicMineral;
use App\Models\Mine;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait UserData
{
    public int $userId;

    public bool $premium;

    public \App\Models\User $userDataModel;

    public \App\Models\BasicMineral $basicMineralUserModel;

    public \App\Models\AdvancedMineral $advancedMineralUserModel;
    
    public \App\Models\Mine $mineUserModel;

    public function setUserId($userId = null)
    {
        if(empty($userId)){
            $this->userId = Auth::id();
        } else {
            $this->userId = $userId;
        }
        return $this;
    }

    public function setUserModels()
    {
        $this->setUserDataModel()
             ->setUserBasicMineralModel()
             ->setUserAdvancedMineralModel()
             ->setUserMineModel();

        return $this;
    }
    
    public function setUserDataModel()
    {
        $this->userDataModel = User::find($this->userId);
        $this->setPremium();
        return $this;
    }

    public function setUserBasicMineralModel()
    {
        $this->basicMineralUserModel = BasicMineral::find($this->userId);
        return $this;
    }
    
    public function setUserAdvancedMineralModel()
    {
        $this->advancedMineralUserModel = AdvancedMineral::find($this->userId);
        return $this;
    }

    public function setUserMineModel()
    {
        $this->mineUserModel = Mine::find($this->userId);
        return $this;
    }

    private function setPremium()
    {
        if($this->userDataModel->premium_end > date('Y-m-d H:i:s'))
        {
            $this->premium = true;
            return $this;
        }
        $this->premium = false;
        return $this;
    }
}