<?php
namespace App\Lib\Debts;

use App\Lib\Interfaces\Debt;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Lib\Traits\Requestable;

abstract class AbstractDebt implements Debt
{
    use Requestable;
    use UserData;

    /**
     * Constructor of class
     *
     * @param string $type
     * @param \Illuminate\Http\Request $request
     */
    public function __construct($type, Request $request = null)
    {
        $this->setType($type)
             ->setRequest($request)
             ->setUserId()
             ->setUserModels();
    }

    protected function setLoanData()
    {
        if($this->request->has('kind')){
            $this->setKind($this->request->kind);
        }
        if($this->request->has('amount')){
            $this->setAmount($this->request->amount);
        }
        if($this->request->has('amount')){
            $this->setDate($this->request->date);
        }
        return $this;
    }

    /**
     * Debt Type Setter
     *
     * @return object
     */
    protected function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    protected function setKind($kind)
    {
        $this->kind = $kind;
        return $this;
    }

    protected function getKind()
    {
        return $this->kind;
    }

    protected function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    protected function getAmount()
    {
        return $this->amount;
    }

    protected function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    protected function getDate()
    {
        return $this->date;
    }

    protected function setModel()
    {
        $this->model = new Debt();
    }

    protected function saveModel()
    {
        $this->model->create([
            'user_id' => $this->userId, 'type' => $this->type, 'kind' => $this->kind, 'amount' => $this->amount,
            'date' => $this->date, 'completed' => $this->date, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
        ]);
    }
}