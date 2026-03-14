<?php declare(strict_types=1);

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', static fn (Request $request) => $request->user())->middleware('auth:sanctum');

Route::get('/users', static fn () => User::all());
