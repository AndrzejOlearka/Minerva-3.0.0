<?php
namespace App\Lib\Debts;

use Carbon\Carbon;
use App\Models\DebtAttempt;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;

class Decision 
{
    use UserData;

    protected int $ratio;

    protected string $type;

    protected int $result;

    public function __construct(Request $request)
    {
        $this->setUserId();
        $this->request = $request;
        $this->attempt = new DebtAttempt();
    }

    public function setRatio()
    {
        $this->ratio = $this->request->ratio;
        return $this;
    }

    public function setType()
    {
        $this->type = $this->request->type;
        return $this;
    }

    public function randDebtAttempt()
    {
        $probability = rand(1, 100);
        $this->result = $probability <= $this->ratio ? 1 : 0;
        return $this;
    }

    public function saveAttempt()
    {
        $this->attempt->updateOrCreate(
            ['user_id' => $this->userId], 
            ['type' => $this->type, 'percentage' => $this->ratio, 'successful' => $this->result,
            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
        ]);
    }

    public function process()
    {
        $this->setRatio()
             ->setType()
             ->randDebtAttempt()
             ->saveAttempt();
    }

    public function getDecision()
    {
        $this->process();
        if($this->request->ajax()){
            return response()->json([
                'result' => $this->result
            ]);
        } else {
            return $this->result;
        }
    }

}