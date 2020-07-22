<?php
namespace App\Lib\Debts;

use App\Lib\Repositories\UserRepository;
use App\Models\Debt;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use App\Lib\Traits\Requestable;

class Bank 
{
    use UserData;

    const MAX_RATIO = 100;
    
    public $credits;

    public function __construct()
    {
        $this->setUserId()
             ->setUserDataModel()
             ->getAllCredits();
    }

    public function getLoanWorthiness()
    {
        $this->debt = '\\App\\Lib\\Debts\\Loan';
        $this->setLoanLimit();
        $this->getLoanRatio();
        return $this;
    }

    public function getCreditWorthiness()
    {
        $this->debt = '\\App\\Lib\\Debts\\Credit';
        $this->setCreditLimit();
        $this->getCreditRatio();
        return $this;
    }

    public function setLoanLimit()
    {
        if($this->userDataModel->level <= $this->debt::LEVEL_INCREASE)
        {
            $this->loanLimit = $this->debt::COINS_INCREASE;
        } else {
            $this->loanLimit = ($this->userDataModel->level - $this->debt::LEVEL_INCREASE) * $this->debt::COINS_INCREASE;
        }
        return $this;
    }

    public function setCreditLimit()
    {
        $this->creditLimit['gold'] = $this->userDataModel->level * $this->debt::GOLD_LEVEL_INCREASE;
        $this->creditLimit['silver'] = $this->userDataModel->level * $this->debt::SILVER_LEVEL_INCREASE;

        return $this;
    }

    public function getLoanLimit()
    {
        return $this->loanLimit;
    }

    public function getCreditLimit()
    {
        return $this->creditLimit;
    }

    public function getRatio()
    {
        return $this->ratio;
    }

    protected function getAllCredits()
    {
        $this->credits = Debt::where('user_id', $this->userId);
        return $this;
    }

    public function checkIfClientHadDebts()
    {
        if($this->credits->count() == 0){
            return false;
        }   
        return true;
    }

    public function getLoanRatio()
    {
        if(!$this->checkIfClientHadDebts()){
            $this->ratio = self::MAX_RATIO;
        }
        $unpaidCredits = $this->credits->where('completed', 0)->count();
        $ratio = $this->debt::START_WORTHINESS - ($unpaidCredits * $this->debt::UNPAID_WORTHINESS_FALL);
        if($ratio < $this->debt::MINIMUM_WORTHINESS)
        {
            $ratio = $this->debt::MINIMUM_WORTHINESS;
        }
        $this->ratio = $ratio;
        return $this;
    }

    public function getCreditRatio()
    {
        if(!$this->checkIfClientHadDebts()){
            $this->ratio = self::MAX_RATIO;
            return $this;
        }
        $unpaidCredits = $this->credits->where('completed', 0)->count();
        $mines = (new UserRepository)->getUserMineAmount($this->userId);
        $minesRatio = $mines * $this->debt::SINGLE_MINE_WORTHINESS;
        if($minesRatio > $this->debt::MAX_MINE_WORTHINESS){
            $minesRatio = $this->debt::MAX_MINE_WORTHINESS;
        }
        $ratio = $this->debt::START_WORTHINESS - ($unpaidCredits * $this->debt::UNPAID_WORTHINESS_FALL()) + $minesRatio;
        if($ratio < $this->debt::MINIMUM_WORTHINESS)
        {
            $ratio = $this->debt::MINIMUM_WORTHINESS;
        }
        if($ratio > self::MAX_RATIO)
        {
            $ratio = self::MAX_RATIO;
        }
        $this->ratio = $ratio;
        return $this;
    }
}