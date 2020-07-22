<?php

namespace App\Lib\Actions;

class Trip extends AbstractAction
{
    const ACTION_LANG = 'trips';

    const TIME_SETTING = 'tripTime';

    const PRIZE_COINS_SETTING = 'tripPrizeCoins';

    const PRIZE_BASIC_MINERALS_SETTING = 'tripPrizeBasicMinerals';

    const PRIZE_ADVANCED_MINERALS_SETTING = 'tripPrizeAdvancedMinerals';

    const PRIZE_EXP_SETTING = 'tripPrizeExp';

    const COST_COINS_SETTING = 'tripCostCoins';

    const COST_BASIC_MINERALS_SETTING = 'tripCostBasicMinerals';

    const COST_ADVANCED_MINERALS_SETTING = 'tripCostAdvancedMinerals';

    const LEVEL_SETTING = 'tripLevel';

    const NAME_SETTING = 'tripNames';

    const EXTRA_PRIZE = true;
}