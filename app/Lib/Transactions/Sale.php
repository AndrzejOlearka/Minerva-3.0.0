<?php
namespace App\Lib\Transactions;

use App\Lib\Traits\Requestable;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use App\Lib\Traits\SettingsTrait;
use Exception;

class Sale extends AbstractShopping
{
    use Requestable;
    use UserData;
    use SettingsTrait;

    const BASIC_MINERAL = 'basicMineral';
    const ADVANCED_MINERAL = 'advancedMineral';

    private function prepare()
    {
        $this
            ->setMineral()
            ->setType()
            ->setModel()
            ->setAmount()
            ->setCost()
            ->setTotal();

        return $this;
    }
    
    private function errorSale($error)
    {
        return response()->json([
            'error' => $error
        ]);
    }

    public function sell()
    {
        try {
            return $this
                ->prepare()
                ->validate()
                ->confirm()
                ->getUpdatedData();

        } catch(\Exception $e)
        {
            return $this->errorSale($e);
        }
    }

    private function validate()
    {
        $mineral = $this->mineral;
   
        if($this->model->$mineral - $this->amount < 0)
        {
            throw new Exception('Incorrect value!');
        }

        return $this;
    }

    private function confirm()
    {
        $result = $this->model->decrement($this->mineral, $this->amount);
        if(!$result){
            throw new Exception('Sale had to be stopped!');
        }
        $result = $this->userDataModel->increment('coins', $this->total);
        return $this;
    }

    private function getUpdatedData()
    {
        $mineral = $this->mineral;
        return response()->json([
            'error' => false,
            'mineral' => $this->mineral,
            'total' => $this->total,
            'amount' => $this->amount,
            'newAmount' => $this->model->$mineral,
            'mineralLang' => trans_choice('equipment.minerals.'.$this->mineral.'.amountPlural', $this->amount, ['amount' => $this->amount]),
            'coinsLang' => trans_choice('equipment.cost', $this->total, ['cost' => $this->total])
        ]);
    }
}
