<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanTmpFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmp:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean temporary file created by imagick';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $status = exec('rm -rf /tmp/*');
        return $status;
    }
}
