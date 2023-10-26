<?php

use Illuminate\Support\Facades\Route;

#B
use App\Http\Controllers\v1\Website\BanglaPdfController;


Route::get("/pdf",[BanglaPdfController::class,"showBanglaPdf"])->name("showBanglaPdf");

Route::get('/', function () {
    return view('admin.dashboard.dashboard');
});
