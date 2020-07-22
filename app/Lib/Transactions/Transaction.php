<?php

namespace App\Lib\Transactions;

use Exception;
use App\Models\MarketOffer;
use Illuminate\Http\Request;
use App\Models\MarketTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Transaction extends AbstractShopping
{
    protected \App\Models\MarketTransaction $transaction;
    protected \App\Models\MarketOffer $offer;


    private function getOffer()
    {
        $this->offer = MarketOffer::find($this->request->offerid);
        if(empty($this->offer->id)){
            throw new Exception('Nie ma takiej oferty!');
        }
        $this
            ->setCost($this->offer->cost)
            ->setMineral($this->offer->mineral)
            ->setType($this->offer->type);
            
        return $this;
    }

    private function validateCoinsTransaction()
    {
        if($this->userDataModel->coins < $this->total)
        {
            throw new Exception('Nie masz tyle pieniędzy!');
        }
        return $this;
    }

    private function validateMineralTransaction()
    {
        $mineral = $this->offer->mineral;
        if($this->model->$mineral - $this->amount < 0)
        {
            throw new Exception('Sprzedawca nie ma tyle minerałów!');
        }
        return $this;
    }

    private function changeShopperData()
    {
        $this->userDataModel->decrement('coins', $this->total);
        $this->model->increment($this->offer->mineral, $this->amount);
        return $this;
    }

    private function changeSellerData()
    {
        $this->setUserId($this->offer->user_id)
             ->setUserModels()
             ->setModel()
             ->validateMineralTransaction();

        $this->userDataModel->increment('coins', $this->total);
        $this->model->decrement($this->offer->mineral, $this->amount);

        return $this;
    }

    private function updateOffer()
    {
        $this->offer->decrement('amount', $this->amount);
        $this->offer->update(['updated_at' => date('Y-m-d H:i:s')]);
        if($this->offer->amount <= 0)
        {
            $this->offer->delete();
        }

        return $this;
    }

    protected function addTransactionEntry()
    {
        $this->transaction = MarketTransaction::create([
            'user_id' => Auth::id(), 'offer_id' => $this->offer->id, 'amount' => $this->amount, 
            'total' => $this->total, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')
        ]);
        return $this;
    }

    private function transactionSession($error = null)
    {
        if($error){
            $transaction['error'] = $error;
        } else {
            $transaction = [
                'id' => $this->transaction->id,
                'mineral' => $this->offer->mineral,
                'amount' => $this->amount
            ];
        }
        return $transaction;
    }

    public function add()
    {
        try 
        {
            $this
                 ->setAmount()
                 ->getOffer()
                 ->setTotal()
                 ->validateCoinsTransaction()
                 ->setModel();

                DB::beginTransaction();
                try {
                    $this->changeShopperData()
                         ->changeSellerData()
                         ->updateOffer()
                         ->addTransactionEntry();

                    DB::commit();
                } catch (\Throwable $e) {
                    dd($e->getMessage());
                    DB::rollback();
                }

            return redirect()
                    ->back()
                    ->with(['transaction' => $this->transactionSession()]);
        } 
        catch (\Exception $e) 
        {
            return redirect()
                    ->back()
                    ->with(['transaction' => $this->transactionSession($e->getMessage())]);
        }
    }
}