<?php

use App\Http\Controllers\Api\ProblemSolverController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
  Route::post('/solve/{id}', [ProblemSolverController::class, 'solve']);
});