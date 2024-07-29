<?php

namespace OroxMedia\OpenDataSoft\Commands;

use Illuminate\Console\Command;

class OpenDataSoftCommand extends Command
{
    public $signature = 'opendatasoft';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
