<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelScreenshot\Facades\Screenshot;
use Exception;

class ScreenShotService
{
    public static function TakeScreenshot($link)
    {
              $fileName = 'screenshots/' . uniqid() . '.png';

        try {
                 Screenshot::url($link)->disk('s3')->save($fileName);

            if (Storage::disk('s3')->exists($fileName)) {
                return Storage::disk('s3')->url($fileName);
            }

            throw new Exception('La capture d\'écran n\'a pas pu être enregistrée sur S3.');
        } catch (Exception $exception) {
            $fallbackName = 'screenshots/' . uniqid() . '.png';
            Screenshot::url($link)->disk('public')->save($fallbackName);
            return Storage::disk('public')->url($fallbackName);
        }
    }
}
