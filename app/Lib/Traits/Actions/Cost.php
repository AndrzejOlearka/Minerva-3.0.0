<?php

namespace App\Lib\Traits\Actions;

use App\Exceptions\ActionPaymentException;
use Illuminate\Support\Facades\DB;

trait Cost
{
    use \App\Lib\Traits\SettingsTrait;

    protected int $coinsCost;

    protected array $basicMineralCost = [];

    protected array $advancedMineralCost = [];

    protected array $costErrors = [];

    public function getCoinsCost()
    {
        return $this->getSettings($this->actionClass::COST_COINS_SETTING)[$this->number];
    }

    public function getBasicMineralCost()
    {
        return $this->getSettings($this->actionClass::COST_BASIC_MINERALS_SETTING)[$this->number];
    }

    public function getAdvancedMineralCost()
    {
        return $this->getSettings($this->actionClass::COST_ADVANCED_MINERALS_SETTING)[$this->number];
    }

    public function setCoinsCost($coinsCost)
    {
        $this->coinsCost = $coinsCost;
        return $this;
    }

    public function setBasicMineralCost($basicMineralCost)
    {
        $this->basicMineralCost = $basicMineralCost;
        return $this;
    }

    public function setAdvancedMineralCost($advancedMineralCost)
    {
        $this->advancedMineralCost = $advancedMineralCost;
        return $this;
    }

    public function setCoinsPayment()
    {
        if($this->coinsCost == 0){
            return;
        } 
        $diff = $this->userDataModel->coins - $this->coinsCost;
        if($diff < 0){
            $this->costErrors['userDataModel']['coins'] = abs($diff);
        } else {
            $this->payments['userDataModel']['coins'] = $this->coinsCost;
        }
    }

    public function setBasicMineralPayment()
    {
        if(count($this->basicMineralCost) == 0){
            return;
        } 
        
        foreach($this->basicMineralCost as $name => $cost){
            $diff = $this->basicMineralUserModel->$name - $cost;
            if($diff < 0){
                $this->costErrors['basicMineralUserModel'][$name] = abs($diff);
            } else {
                $this->payments['basicMineralUserModel'][$name] = $cost;
            }
        }
        return $this;
    }

    public function setAdvancedMineralPayment()
    {
        if(count($this->advancedMineralCost) == 0){
            return;
        } 
       
        foreach($this->advancedMineralCost as $name => $cost){
            $diff = $this->advancedMineralUserModel->$name - $cost;
            if($diff < 0){
                $this->costErrors['advancedMineralUserModel'][$name] = abs($diff);
            } else {
                $this->payments['advancedMineralUserModel'][$name] = $cost;
            }
        }
        return $this;
    }

    private function getCosts()
    {
        $this->setCoinsCost($this->getCoinsCost());
        $this->setBasicMineralCost($this->getBasicMineralCost());
        $this->setAdvancedMineralCost($this->getAdvancedMineralCost());
        return $this;
    }

    public function makePayments()
    {
        $this->getCosts();
        $this->setCoinsPayment();
        $this->setBasicMineralPayment();
        $this->setAdvancedMineralPayment();
        if(count($this->costErrors) == 0){
            if($this->finalizePayments()){
                return $this;
            }
            throw new ActionPaymentException('Unable to finalize payment.');
        } else {
            throw new ActionPaymentException('missing');
        }
        return $this;
    }

    public function finalizePayments()
    {
        if(empty($this->payments)){
            return true;
        }

        DB::beginTransaction();
        try {
            foreach ($this->payments as $type => $payments)
            {
                $this->finalizeSinglePayments($type, $payments);
            }
            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollback();
            return false;
        }
    }

    private function finalizeSinglePayments($type, $payments)
    {
        foreach($payments as $name => $payment)
        {
            $this->$type->decrement($name, $payment);
        }
    }

    public function getCostErrors()
    {
        return $this->costErrors;
    }
}