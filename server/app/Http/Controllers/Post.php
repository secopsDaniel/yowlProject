<?php

namespace App\Http\Controllers;
use App\Services\OpenGraphService;
use Illuminate\Http\Request;
use App\Services\ScreenShotService;



class post extends Controller
{


 public function getDataFromLink(Request $req){

   $link = $req->validate([
      'link' =>['required', 'string', 'url'],
   ]);



    $res = OpenGraphService::fetchUrl($link['link']);
    $capture = ScreenShotService::TakeScreenshot($link['link']);

    
   return ["openGraph" =>$res,"image" =>$capture] ;


 }


}
