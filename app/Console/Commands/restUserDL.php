<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class restUserDL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:userdl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset User Downloads';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::table('users')->update(['dlcount' => 0]);
        return COMMAND::SUCCESS;
    }
}
