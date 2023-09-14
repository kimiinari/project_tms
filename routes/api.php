<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetDataFromDB;

Route::middleware(['auth:api'])->group(function () {
    Route::get('skus', 'Api\SkusController@getSkus');
});


Route::get('/getData', [GetDataFromDB::class, 'getData']);

