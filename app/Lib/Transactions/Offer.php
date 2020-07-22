<?php

namespace App\Lib\Transactions;

use Exception;
use Carbon\Carbon;
use App\Models\MarketOffer;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use App\Lib\Traits\Requestable;
use App\Lib\Traits\SettingsTrait;
use App\Exceptions\MarketException;
use App\Lib\Repositories\MarketRepository;

class Offer extends AbstractShopping
{
    /**
     * Function for finalize offer creation
     *
     * @return session with success or failure 
     */
    public function finalizeOffer()
    {
        try {
            $result = $this->prepareOffer()
                 ->validateOffer()
                 ->saveOffer();

            return $this->offerSession('offerCreateSuccess', $result->id);
        } 
        catch (MarketException $e) {
            return $this->offerSession('offerCreateError', $e, true);
        }
    }

    /**
     * Function for finalize offer removal
     *
     * @return session with success or failure 
     */
    public function deleteOwnOffer()
    {
        try {
            if(empty($this->request->offerid)){
                throw new MarketException('Nie ma takiej oferty!');
            }
            $result = (new MarketRepository)->deleteOffer($this->request->offerid);
            if(empty($result)){
                throw new MarketException('Nie ma takiej oferty!');
            }
            return $this->offerSession('offerDeleteSuccess', $this->request->offerid);
        } 
        catch (MarketException $e) {
            return $this->offerSession('offerDeleteError', $e, true);
        }
    }

    /**
     * Function for getting
     *
     * @return json data
     */
    public function getOffer()
    {
        try {
            $offer = MarketOffer::find($this->request->offerid);
            if(empty($offer->id)){
                throw new MarketException('Nie ma takiej oferty!');
            }
            return $this->offerResponse('offer', $offer);
        } 
        catch (MarketException $e) {
            return $this->offerResponse('error', $e->getMessage());
        }
    }

    private function prepareOffer()
    {
        $this
            ->setMineral()
            ->setAmount()
            ->setCost()
            ->setType()
            ->setModel();

        return $this;
    }

    private function saveOffer()
    {
        $result = MarketOffer::create([
            'user_id' => $this->userId, 'type' => $this->type, 'mineral' => $this->mineral, 'amount' => $this->amount,
            'cost' => $this->cost, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
        ]);
        if(!$result->id){
            throw new Exception('Nie można było zapisać oferty!');
        }
        return $result;
    }

    private function validateOffer()
    {
        $mineral = $this->mineral;
        if($this->model->$mineral < $this->amount)
        {
            throw new MarketException('Nie masz takiej ilości minerałów!');
        }
        return $this;
    }

    private function offerSession($name, $result, $error = false)
    {
        if($error){
            $offer = [$name => ['error' => $result->getMessage()]];
        } else {
            $offer = [$name => ['result' => $result]];
        }
        return redirect()
            ->back()
            ->with($offer);
    }

    private function offerResponse($name, $result)
    {
        if ($this->request->ajax()) {
            return response()->json([
                $name => $result
            ]);
        }
        return $result;
    }
}
