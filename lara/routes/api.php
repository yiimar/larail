<?php

declare(strict_types=1);

use App\Domain\Skill\UI\Http\Api\Controller\SkillController;
use App\Domain\User\UI\Http\Api\Controller\List\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', static function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users/list',UserController::class);
Route::apiResource('/skills',SkillController::class);
