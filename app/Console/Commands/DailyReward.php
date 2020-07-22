<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Lib\Creators\DailyReward as DailyRewardCreator;

class DailyReward extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:reward';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task for unbaning users that running every 5 minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $reward = new DailyRewardCreator(2);
        $reward->saveReward();
    }
}
