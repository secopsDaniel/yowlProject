<?php

namespace App\Http\Controllers;
use App\Services\OpenGraphService;
use Illuminate\Http\Request;
use OpenGraph;



class post extends Controller
{


 public function getDataFromLink(Request $req){

   $link = $req->validate([
      'link' =>['required', 'string', 'url'],
   ]);



    $res= OpenGraphService::fetchFromUrl($link['link']);
    //   $data =  OpenGraph::fetch($link['link']);

//    return ['myOwnService' =>$res, "librairie" =>$data];
return $res;


 }


}
