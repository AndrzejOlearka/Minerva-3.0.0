<?php

namespace App\Lib\Traits\Actions;

trait Prize
{
    use \App\Lib\Traits\SettingsTrait;

    protected object $pricingModel;

    protected ?int $coinsPrize = null;

    protected ?int $basicMineralPrize = null;

    protected ?int $advancedMineralPrize = null;

    protected ?int $expPrize = null;

    public function getBasicMineralPrize()
    {
        return $this->getSettings($this->actionClass::PRIZE_BASIC_MINERALS_SETTING)[$this->number];
    }

    public function getAdvancedMineralPrize()
    {
        return $this->getSettings($this->actionClass::PRIZE_ADVANCED_MINERALS_SETTING)[$this->number];
    }

    public function getCoinsPrize()
    {
        return $this->getSettings($this->actionClass::PRIZE_COINS_SETTING)[$this->number];
    }

    public function getExpPrize()
    {
        return $this->getSettings($this->actionClass::PRIZE_EXP_SETTING)[$this->number];
    }

    public function randPrize($min, $max)
    {
        return mt_rand($min, $max);
    }

    public function getPrize($prize)
    {
        if(isset($prize['max']) && $prize['max'] !== 0)
        {
            return $this->randPrize($prize['min'], $prize['max']);
        } else {
            return $prize['min'];
        }
    }

    public function setBasicMineralPrize($basicMineralPrize)
    {
        $this->basicMineralPrize = $this->doublePrize($this->getPrize($basicMineralPrize));
        return $this;
    }

    public function setAdvancedMineralPrize($advancedMineralPrize)
    {
        $this->advancedMineralPrize = $this->doublePrize($this->getPrize($advancedMineralPrize));
        return $this;
    }

    public function setCoinsPrize($coinsPrize)
    {
        $this->coinsPrize = $this->doublePrize($this->getPrize($coinsPrize));
        return $this;
    }

    public function setExpPrize($expPrize)
    {
        $this->expPrize = $expPrize;
        return $this;
    }
    
    public function doublePrize($prize)
    {
        if($this->model->action_prize === 1){
            return $prize * 2;
        }
        return $prize;
    }

    public function addBasicMineralPrize()
    {
        if(!empty($this->basicMineralPrize)){
            $this->basicMineralUserModel->increments($this->actionName, $this->basicMineralPrize);
        }
        return $this;
    }

    public function addAdvancedMineralPrize()
    {
        if(!empty($this->advancedMineralPrize)){
            $this->advancedMineralUserModel->increments($this->actionName, $this->advancedMineralPrize);
        }
        return $this;
    }

    public function addCoinsPrize()
    {
        if(!empty($this->coinsPrize)){
            $this->userDataModel->increment('coins', $this->coinsPrize);
        }
        return $this;
    }

    public function addExpPrize()
    {
        if(!empty($this->expPrize)){
            $this->userDataModel->increment('exp', $this->expPrize);
        }
        return $this;
    }

    public function addMinePrize()
    {
        if(!empty($this->actionName)){
            $this->mineUserModel->increments($this->actionName, 1);
        }
        return $this;
    }

    public function getPrizes()
    {
        $this->setBasicMineralPrize($this->getBasicMineralPrize());
        $this->setAdvancedMineralPrize($this->getAdvancedMineralPrize());
        $this->setCoinsPrize($this->getCoinsPrize());
        $this->setExpPrize($this->getExpPrize());
             
        return $this;
    }

    public function addMinesPrizes()
    {
        $this->setExpPrize($this->getExpPrize())->addExpPrize();
        $this->addMinePrize();

        return $this;
    }

    public function addPrizes()
    {
        $this->getPrizes()
             ->addBasicMineralPrize()
             ->addAdvancedMineralPrize()
             ->addCoinsPrize()
             ->addExpPrize();

        return $this;
    }

    public function randExtraPrize()
    {
        $randomNumber = mt_rand(1, 10);
        return $randomNumber == 2 || $randomNumber == 7 ? true : false;
    }

    protected function setExtraPrize()
    {
        if($this->randExtraPrize() && $this->actionClass::EXTRA_PRIZE){
            $this->actionTime = $this->actionTime * 2;
            $this->model->update([
                'action_prize' => 1
            ]);
        } else {
            $this->model->update([
                'action_prize' => 0
            ]);
        }
        return $this; 
    }
}