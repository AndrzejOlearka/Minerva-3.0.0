<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReward extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'daily_rewards';

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'availability', 'reward_time', 'reward_days'
    ];
}
