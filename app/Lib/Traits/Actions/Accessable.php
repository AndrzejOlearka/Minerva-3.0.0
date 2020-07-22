<?php

namespace App\Lib\Traits\Actions;

trait Accessable
{
    use \App\Lib\Traits\SettingsTrait;

    private function getLevelSettings()
    {
        return $this->getSettings($this->actionClass::LEVEL_SETTING);
    }

    public function getCostSettings()
    {
        return $this->getSettings($this->actionClass::COST_COINS_SETTING);
    }

    public function processSettings($settings, $compare)
    {
        $availableActions = [];
        foreach($settings as $number => $setting){
            $availableActions[$number] = $setting <= $compare;
        }
        return $availableActions;
    }

    public function getAvailableActionsByLevel()
    {
        return $this->processSettings($this->getLevelSettings(), $this->userDataModel->level);
    }

    public function getAvailableActionsByCost()
    {
       return $this->processSettings($this->getCostSettings(), $this->userDataModel->coins);
    }
}