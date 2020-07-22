<?php
namespace App\Lib\Actions;

use App\Exceptions\ActionPaymentException;
use App\Lib\Traits\Actions\ActionLang;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use App\Lib\Interfaces\Action;
use App\Lib\Helpers\DateHelper;
use App\Lib\Traits\Requestable;
use App\Lib\Traits\Actions\Cost;
use App\Lib\Traits\Actions\Prize;
use App\Lib\Traits\Actions\Accessable;

abstract class AbstractAction implements Action
{
    use Requestable;
    use UserData;
    use Cost;
    use Prize;
    use Accessable;
    use ActionLang;

    /**
     * Type of action
     * 
     * @var string
     */
    protected string $type;

    /**
     * Database number of action
     * 
     * @var int
     */
    protected int $number;

    /**
     * Time of action in seconds
     * 
     * @var int
     */
    protected int $actionTime;

    /**
     * Cost of action in coins
     * 
     * @var int
     */
    protected int $actionCost;

    /**
     * Action class name of type
     * 
     * @var string
     */

    protected string $actionClass;

    /**
     * Action name for settings
     * 
     * @var string
     */

    protected string $actionName;

    /**
     * Model for action class
     * 
     * @var string
     */
    public \Illuminate\Database\Eloquent\Model $model;

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
             ->setUserModels()
             ->setModel()
             ->setActionClass()
             ->setNumber()
             ->setActionName();
    }

    /**
     * Action Type Setter
     *
     * @return object
     */
    protected function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Action Model Setter
     *
     * @return object
     */
    protected function setModel()
    {
        $model = Action::MODEL_NAMESPACE.'\\'.ucfirst($this->type);
        $this->model = $model::find($this->userId);
        return $this;
    }

    /**
     * Action Number Setter
     *
     * @return object
     */
    protected function setNumber()
    {
        $this->number = isset($this->request->post()['number']) ? 
            $this->request->post()['number'] : 
            (array_key_exists('action_number', $this->model->getAttributes()) ? $this->model->action_number : 0);
        return $this;
    }

    /**
     * Action Class Setter
     *
     * @return object
     */
    protected function setActionClass()
    {
        $this->actionClass = get_called_class();
        return $this;
    }

    /**
     * Action Name Setter
     *
     * @return object
     */
    protected function setActionName()
    {
        if(!empty($this->number)){
            $this->actionName = $this->getSettings($this->actionClass::NAME_SETTING)[$this->number];
            return $this; 
        }
    }

    /**
     * Action Time Setter
     *
     * @return object
     */
    protected function setActionTime()
    {
        $this->actionTime = $this->getSettings($this->actionClass::TIME_SETTING)[$this->number];
        return $this;
    }

    /**
     * Action Cost Setter
     *
     * @return object
     */
    protected function setActionCoinCost()
    {
        $this->actionCost = $this->getSettings($this->actionClass::COST_COINS_SETTING)[$this->number];
        return $this;
    }

    /**
     * Start Action from ActionController@create
     * 
     * Update action_number, date_start, date_end
     *
     * @return json response with data
     */
    public function start()
    {
        try {
            $this
                ->setActionTime()
                ->makePayments()
                ->setExtraPrize()
                ->updateActionDataStart();
            
            return $this->getJSONActionEndTime();
        } 
        catch (ActionPaymentException $exception)
        {
            return $this->getJSONPaymentsError();
        }
    }

    /**
     * Add Mine actions only for MineController
     *
     * @return json response with data
     */
    public function add()
    {
        try {
            $this
                ->setNumber()
                ->makePayments()
                ->addMinesPrizes();

            return $this->getJSONFinishActionData();
        } 
        catch (ActionPaymentException $exception)
        {
            return $this->getJSONPaymentsError();
        }
    }

    /**
     * Add Mine actions only for MissionsController
     *
     * @return json response with data
     */
    public function complete()
    {
        try {
            $this
                ->setNumber()
                ->makePayments()
                ->addPrizes(); 

            return $this->getJSONFinishActionData();
        } 
        catch (ActionPaymentException $exception)
        {
            return $this->getJSONPaymentsError();
        }
    }

    /**
     * Finish Action from ActionController@complete
     * 
     * Update action_number to zero value or return end_time 
     *
     * @return json response with data
     */
    public function finish()
    {
        if($this->model->action_number === 0)
        {
            return $this->getJSONActionEndTime();
        }
        
        $this->addPrizes()
             ->updateActionDataFinish();
        
        return $this->getJSONFinishActionData();
    }

    /**
     * Check Action from ActionController@show
     * 
     * check if action is exists, in other way finish the action
     *
     * @return json response with data
     */
    public function check()
    {
        return $this->model->date_end > date('Y-m-d H:i:s') && $this->model->action_number !== 0 ? 
            $this->getJSONActionEndTime(): 
            $this->finish();
    }

    /**
     * Display Action from ActionController@index
     *
     * @return array blade variables stored in ActionData var
     */
    public function display()
    {
        return [
            'actionAvailableByLevel' => $this->getAvailableActionsByLevel(),
            'actionAvailableByCost' => $this->getAvailableActionsByCost(),
            'actionDesc' => $this->getLangByActionNumber('desc'),
        ];
    }

    /**
     * Getter for data to counting end time action 
     *
     * @return array json response
     */
    private function getJSONActionEndTime()
    {
        return response()->json([
            'date_end' => strtotime($this->model->date_end) * 1000,
            'actionType' => $this->type,
            'actionDesc' => $this->getLangByActionNumber('desc'),
        ]);
    }

    /**
     * Getter for data with action prize result
     *
     * @return array json response
     */
    private function getJSONFinishActionData()
    {
        return response()->json([
            'actionName' => $this->actionName,
            'prizeInfo' => $this->setPrizeAmountsLang()
        ]); 
    }

    /**
     * Getter for data with payments errors
     *
     * @return array json response
     */
    private function getJSONPaymentsError()
    {
        return response()->json([
            'actionName' => $this->actionName,
            'costErrors' => $this->processCostErrors()->getCostErrors()
        ]); 
    }

    /**
     * Updating action start and end date
     *
     * @return object
     */
    private function updateActionDataStart()
    {
        $this->model->update([
            'action_number' => $this->number,
            'date_start' => DateHelper::currentDate(),
            'date_end' => DateHelper::setDate($this->actionTime)
        ]);
        return $this;
    }

    /**
     * Updating action back to 0 
     *
     * @return object
     */
    private function updateActionDataFinish()
    {
        $this->model->update([
            'action_number' => 0
        ]);
        return $this;
    }
}
