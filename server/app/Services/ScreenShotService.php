<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelScreenshot\Facades\Screenshot;


class ScreenShotService
{
    public static function TakeScreenshot($link){
        $fileName = 'screenshots/'. uniqid() . '.png'; 
        
       Screenshot::url($link)->disk('s3')
           ->save($fileName);

        
        return Storage::disk('s3')->url($fileName);

            } 
            


}