<?php

namespace App\Lib\Transactions;

use Exception;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use App\Lib\Traits\Requestable;
use App\Lib\Traits\SettingsTrait;
use App\Exceptions\MarketException;
use Illuminate\Support\Facades\Schema;

abstract class AbstractShopping
{
    use UserData;
    use Requestable;
    use SettingsTrait;

    const BASIC_MINERAL = 'basicMineral';
    const ADVANCED_MINERAL = 'advancedMineral';

    protected string $mineral;
    protected string $basicMineral;
    protected object $model;
    protected int $amount;
    protected int $cost;
    protected int $total;

    public function __construct(Request $request)
    {
        $this
            ->setUserId()
            ->setRequest($request)
            ->setUserModels();
    }

    protected function setModel()
    {
        switch($this->type)
        {
            case Sale::BASIC_MINERAL:
                $this->setUserBasicMineralModel();
                $this->model = $this->basicMineralUserModel;
            break;
            case Sale::ADVANCED_MINERAL:
                $this->setUserAdvancedMineralModel();
                $this->model = $this->advancedMineralUserModel;
            break;
        }
        return $this;
    }

    protected function setMineral($mineral = null)
    {
        if(empty($mineral)){
            if (!empty($this->request->mineral)) {
                $this->mineral = $this->request->mineral;
                return $this;
            }
            throw new MarketException('There is no mineral available for sale!');
        }
        $this->mineral = $mineral;
        return $this;
    }

    protected function setType($type = null)
    {
        if(empty($type)){
            if (!empty($this->request->type)) {
                $this->type = $this->request->type;
                return $this;
            }
            if(Schema::hasColumn($this->basicMineralUserModel->getTable(), $this->mineral)){
                $this->type = self::BASIC_MINERAL;
                return $this;
            } else if (Schema::hasColumn($this->advancedMineralUserModel->getTable(), $this->mineral)){
                $this->type = self::ADVANCED_MINERAL;
                return $this;
            }
            throw new MarketException('There is no supported type of minerals!');
        }
        $this->type = $type;
        return $this;
    }

    protected function setAmount($amount = null)
    {
        if(empty($amount)){
            if (!empty($this->request->amount)) {
                $this->amount = $this->request->amount;
                return $this;
            }
            throw new MarketException('Amount of the minerals is uncorrect!');
        }
        $this->amount = $amount;
        return $this;
    }

    protected function setCost($cost = null)
    {
        if(empty($cost)){
            $costTable = array_merge(
                $this->getSettings('basicMineralCost'),
                $this->getSettings('advancedMineralCost')
            );
            if(!isset($costTable[$this->mineral])){
                throw new MarketException('Unable to find cost of this mineral!');
            }
            $this->cost = $costTable[$this->mineral];
            return $this;
        }
        $this->cost = $cost;
        return $this;
    }

    protected function setTotal()
    {
        if(!empty($this->amount) && !empty($this->cost)){
            $this->total = $this->amount * $this->cost;
        }
        return $this;
    }
}