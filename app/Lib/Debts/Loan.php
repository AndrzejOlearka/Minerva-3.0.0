<?php

namespace App\Lib\Debts;

use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use App\Lib\Interfaces\Debt;
use App\Lib\Traits\Requestable;

class Loan extends AbstractDebt
{
    const LEVEL_INCREASE = 10;

    const COINS_INCREASE = 1000;

    const START_WORTHINESS = 100;

    const UNPAID_WORTHINESS_FALL = 20;

    const MINIMUM_WORTHINESS = 20;
}