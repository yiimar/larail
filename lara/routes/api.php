<?php

declare(strict_types=1);

use App\Module\Auth\User\UI\Http\Api\Controller\List\Controller;
use App\Module\Skill\UI\Http\Api\Controller\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', static function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users/list',Controller::class);
Route::apiResource('/skills',SkillController::class);
