<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Lib\Repositories\BanRepository;

class BansRemover extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bans:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task for daily rewards running every 6 hours';

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
        $users = (new BanRepository())->bannedUsersReasonBehaviour();
        $users->delete();
    }
}
