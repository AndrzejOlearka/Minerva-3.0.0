<?php
namespace App\Lib\Debts;

class Credit extends AbstractDebt
{
    const GOLD_LEVEL_INCREASE = 10;

    const SILVER_LEVEL_INCREASE = 50;

    const START_WORTHINESS = 50;

    const UNPAID_WORTHINESS_FALL = 20;

    const MINIMUM_WORTHINESS = 20;

    const SINGLE_MINE_WORTHINESS = 1;

    const MAX_MINE_WORTHINESS = 40;
}