<?php

use Illuminate\Support\Facades\Route;

Route::name('index')->get('/', [App\Accounts\Http\Controllers\AccountsController::class, 'handle']);
Route::name('show')->get('/{id}', [App\Accounts\Http\Controllers\AccountController::class, 'handle']);
Route::name('create')->post('/', [App\Accounts\Http\Controllers\CreateAccountController::class, 'handle']);
Route::name('edit')->put('/{id}', [App\Accounts\Http\Controllers\EditAccountController::class, 'handle']);
Route::name('destroy')->delete('/{id}', [App\Accounts\Http\Controllers\DestroyAccountController::class, 'handle']);
Route::name('users')->get('/{id}/users', [App\Accounts\Http\Controllers\UsersController::class, 'handle']);
Route::name('organizations')->get('/{id}/organizations', [App\Accounts\Http\Controllers\OrganizationsController::class, 'handle']);
