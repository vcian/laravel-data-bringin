<?php

use Illuminate\Support\Facades\Route;
use Vcian\LaravelDataBringin\Http\Controllers\ImportController;

Route::group(['middleware' => ['web'], 'prefix' => config('data-bringin.path')], function () {
    Route::get('/', [ImportController::class, 'index'])->name('data_bringin.index');
    Route::post('/', [ImportController::class, 'store'])->name('data_bringin.store');
    Route::get('/delete-record/{id}', [ImportController::class, 'deleteRecord'])->name('data_bringin.delete_record');
});
