<?php

namespace App\Lib\Creators;

use App\Lib\Traits\UserData;
use App\Lib\Traits\Actions\Prize;
use App\Lib\Traits\SettingsTrait;

class DailyReward
{
    use UserData;
    use SettingsTrait;
    use Prize;

    /**
     * name of minerals mines
     * 
     * @var array
     */
    protected array $minerals;

    /**
     * rewards for every single mine
     * 
     * @var array
     */
    protected array $rewards;

    /**
     * prize for all mines
     * 
     * @var array
     */
    protected array $prizes;

    public function __construct($userId)
    {
        $this->setUserId($userId)
             ->setUserModels()
             ->setMineralsNames()
             ->setDailyRewardPrizes()
             ->unsetMinerals()
             ->setRewardByMineralName()
             ->setPrizes()
             ->setFinalPrizes();
    }

    public function saveReward()
    {
        foreach ($this->minerals as $mineral)
        {
            $this->basicMineralUserModel->increment($mineral, $this->prizes[$mineral]);
        }
    }

    private function setMineralsNames()
    {
        $this->minerals = $this->getSettings('expeditionNames');
        return $this;
    }

    private function setDailyRewardPrizes()
    {
        $this->rewards = $this->getSettings('dailyRewardBasicMinerals');
        return $this;
    }

    private function setRewardByMineralName()
    {
        foreach($this->minerals as $key => $mineral)
        {
            $this->rewards[$mineral] = $this->rewards[$key];
            unset($this->rewards[$key]);
        }
        return $this;
    }

    private function setPrizes()
    {
        foreach($this->rewards as $mineral => $reward)
        {
            $this->prizes[$mineral] = $this->getPrize($reward);
        }
        return $this;
    }

    private function setFinalPrizes()
    {
        foreach($this->prizes as $mineral => $prize)
        {
            $this->prizes[$mineral] = $prize * $this->mineUserModel->$mineral;
        }
        return $this;
    }

    private function unsetMinerals()
    {
        foreach ($this->minerals as $name => $mineral) {
            if (empty($this->mineUserModel->$mineral)) {
                unset($this->minerals[$name]);
            }
        }
        return $this;
    }
}