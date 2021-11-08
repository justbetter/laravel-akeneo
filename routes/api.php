<?php

use Illuminate\Support\Facades\Route;
use JustBetter\Akeneo\Http\Controllers\WebhookController;

Route::prefix('api/laravel-akeneo')->group(function () {
    Route::post('/webhook', WebhookController::class)->name('akeneo-webhook');
});
