<?php

namespace App\Lib\Traits\Actions;

use App\Lib\Interfaces\Action;

trait ActionLang
{
    public function getLangByActionNumber($type, $qty = null)
    {
        return !empty($qty) ? 
            trans_choice($this->actionClass::ACTION_LANG.'.'.$this->actionClass::ACTION_LANG.'.'.$this->number.'.'.$type, $qty) :
            trans($this->actionClass::ACTION_LANG.'.'.$this->actionClass::ACTION_LANG.'.'.$this->number.'.'.$type);
    }

    public function getLangByAction($type, $qty = null)
    {
        return !empty($qty) ? 
            trans_choice($this->actionClass::ACTION_LANG.'.'.$type, $qty) :
            trans($this->actionClass::ACTION_LANG.'.'.$type);
    }

    public function setUserDataModelErrors()
    {
        if(isset($this->costErrors['userDataModel'])){
            $this->costErrors['list'][] = trans_choice('equipment.cost', 
                $this->costErrors['userDataModel']['coins'],
                ['cost' => $this->costErrors['userDataModel']['coins']]
            );
        }
        return $this;
    }

    public function setBasicMineralsDataModelErrors()
    {
        if(isset($this->costErrors['basicMineralUserModel'])){
            foreach($this->costErrors['basicMineralUserModel'] as $error => $amount){
                $this->costErrors['list'][] = trans_choice('equipment.minerals.'.$error.'.amountPlural', $amount, ['amount' => $amount]);
            }
        }
        return $this;
    }

    public function setAdvancedMineralsDataModelErrors()
    {
        if(isset($this->costErrors['advancedMineralUserModel'])){
            foreach($this->costErrors['advancedMineralUserModel'] as $error => $amount){
                $this->costErrors['list'][] = trans_choice('equipment.minerals.'.$error.'.amountPlural', $amount, ['amount' => $amount]);
            }
        }
        return $this;
    }

    public function processCostErrors()
    {
        $this->setUserDataModelErrors();
        $this->setBasicMineralsDataModelErrors();
        $this->setAdvancedMineralsDataModelErrors();
        return $this;
    }

    public function setPrizeAmountsLang()
    {
        return [
            "basicMinerals" => $this->basicMineralPrize,
            "advancedMinerals" => $this->advancedMineralPrize,
            "exp" => $this->expPrize,
            "coins" => $this->coinsPrize,
            "info" => $this->prizeInfoBuilder()
        ];
    }

    public function prizeInfoBuilder()
    {
        switch($this->actionClass)
        {
   
            case Action::EXPEDITION_CLASS:
                return $this->basicMineralPrize.' '.$this->getLangByActionNumber('prular', $this->basicMineralPrize);
            case Action::TRIP_CLASS:
                return $this->advancedMineralPrize.' '.$this->getLangByActionNumber('prular', $this->advancedMineralPrize);
            case Action::MINE_CLASS:
                return $this->getLangByActionNumber('prular');
            case Action::MISSION_CLASS:
                return $this->getLangByActionNumber('prize');
        }
    }
}