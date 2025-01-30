<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;

Route::prefix("admin")->name("admin.")->group(function () {

    #Dashboard
    Route::prefix("dashboard")->name("dashboard.")->group(function () {
        Route::get("/", [DashboardController::class, "index"])->name("index");
    });


});