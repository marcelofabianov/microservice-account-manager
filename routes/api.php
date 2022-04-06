<?php

use Illuminate\Support\Facades\Route;

/**
 * GET: /api/v1/accounts
 */
Route::prefix('accounts')
    ->as('accounts')
    ->middleware(['api'])
    ->group(base_path('app/Accounts/routes.php'));
