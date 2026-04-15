<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd(class_exists(\Shweshi\OpenGraph\OpenGraph::class));
    // return view('welcome');
});
