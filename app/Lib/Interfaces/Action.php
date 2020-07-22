<?php

namespace App\Lib\Interfaces;

interface Action{
    
    public const NAMESPACE = '\\App\\Lib\\Actions';

    public const MODEL_NAMESPACE = '\\App\\Models';

    public const EXPEDITION = 'expedition';

    public const TRIP = 'trip';

    public const MINE = 'mine';

    public const MISSION = 'mission';

    public const EXPEDITION_CLASS = 'App\\Lib\\Actions\\Expedition';

    public const TRIP_CLASS = 'App\\Lib\\Actions\\Trip';

    public const MINE_CLASS = 'App\\Lib\\Actions\\Mine';

    public const MISSION_CLASS = 'App\\Lib\\Actions\\Mission';
}