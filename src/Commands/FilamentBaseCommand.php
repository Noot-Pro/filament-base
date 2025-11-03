<?php

namespace NootPro\FilamentBase\Commands;

use Illuminate\Console\Command;

class FilamentBaseCommand extends Command
{
    public $signature = 'filament-base';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
