<?php

use App\Http\Controllers\ShoeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/shoes",[ShoeController::class, 'shoes']);

Route::get("/shoe/{id}",[ShoeController::class, 'shoe']);

Route::post("/addshoe",[ShoeController::class, 'addshoe']);

Route::put("/edit/{id}",[ShoeController::class, 'edit']);

Route::delete('/delete/{id}', [ShoeController::class,"delete"]);
