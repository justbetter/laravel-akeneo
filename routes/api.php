<?php

use Illuminate\Support\Facades\Route;
use JustBetter\Akeneo\Http\Controllers\WebhookController;
use JustBetter\Akeneo\Http\Middleware\ValidateAkeneoRequest;

Route::prefix('api/laravel-akeneo')->group(function () {
    Route::post('/webhook', WebhookController::class)
//        ->middleware(ValidateAkeneoRequest::class)
        ->name('akeneo-webhook');
});
