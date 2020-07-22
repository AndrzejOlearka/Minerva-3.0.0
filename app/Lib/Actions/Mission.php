<?php

namespace App\Lib\Actions;

class Mission extends AbstractAction
{
    /**
     * const for action lang name file
     * 
     * @var string 
     */
    const ACTION_LANG = 'missions';

    /**
     * const for action time setting
     * 
     * @var string 
     */
    const TIME_SETTING = 'missionTime';

    /**
     * const for action coins for prize setting
     * 
     * @var string 
     */
    const PRIZE_COINS_SETTING = 'missionPrizeCoins';

    /**
     * const for action basic minerals for prize setting
     * 
     * @var string 
     */
    const PRIZE_BASIC_MINERALS_SETTING = 'missionPrizeBasicMinerals';

    /**
     * const for action advanced minerals for prize setting
     * 
     * @var string 
     */
    const PRIZE_ADVANCED_MINERALS_SETTING = 'missionPrizeAdvancedMinerals';

    /**
     * const for action exp for prize setting
     * 
     * @var string 
     */
    const PRIZE_EXP_SETTING = 'missionPrizeExp';

    /**
     * const for action coins cost setting
     * 
     * @var string 
     */
    const COST_COINS_SETTING = 'missionCostCoins';

    /**
     * const for action basic minerals cost setting
     * 
     * @var string 
     */
    const COST_BASIC_MINERALS_SETTING = 'missionCostBasicMinerals';

    /**
     * const for action advanced minerals cost setting
     * 
     * @var string 
     */
    const COST_ADVANCED_MINERALS_SETTING = 'missionCostAdvancedMinerals';

    /**
     * const for action level setting
     * 
     * @var string 
     */
    const LEVEL_SETTING = 'missionLevel';

    /**
     * const for action names setting
     * 
     * @var string 
     */
    const NAME_SETTING = 'missionNames';

    /**
     * const for action extra prize setting
     * 
     * @var bool 
     */
    const EXTRA_PRIZE = false;
}