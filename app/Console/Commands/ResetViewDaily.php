<?php

// app/Console/Commands/ResetViewDaily.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class ResetViewDaily extends Command
{
    protected $signature = 'reset:view_daily';

    protected $description = 'Reset the view_daily field of all posts daily.';

    public function handle()
    {
        Post::query()->update(['view_daily' => 0]);

        $this->info('View_daily reset successfully.');
    }
}

