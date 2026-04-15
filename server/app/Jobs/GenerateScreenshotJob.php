<?php
namespace App\Jobs;

use Spatie\LaravelScreenshot\Jobs\GenerateScreenshotJob as BaseJob;

class GenerateScreenshotJob extends BaseJob
{
    public int $tries = 3;

    public int $timeout = 120;

    public int $backoff = 30;
}

