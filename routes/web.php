<?php

use Illuminate\Support\Facades\Route;
use MahbodHastam\Linstaller\Http\Controllers\EnvironmentController;
use MahbodHastam\Linstaller\Http\Controllers\MainController;
use MahbodHastam\Linstaller\Http\Controllers\PermissionsController;
use MahbodHastam\Linstaller\Http\Controllers\RequirementsController;

Route::get('/', [MainController::class, 'index']);

// Step 1 - Server requirements
Route::get('/requirements', [RequirementsController::class, 'requirements'])->name('step1.requirements');

// Step 2 - Check permissions
Route::get('/permissions', [PermissionsController::class, 'permissions'])->name('step2.permissions');

// Step 3 - Environment settings
Route::get('/environment', [EnvironmentController::class, 'environmentSelect'])->name('step3.environment');
Route::get('/environment/text-editor', [EnvironmentController::class, 'textEditorShow'])->name('step3.environment.text_editor.show');
Route::post('/environment/text-editor', [EnvironmentController::class, 'textEditorPost'])->name('step3.environment.text_editor.post');
Route::get('/environment/wizard', [EnvironmentController::class, 'wizardShow'])->name('step3.environment.wizard.show');
Route::post('/environment/wizard', [EnvironmentController::class, 'wizardPost'])->name('step3.environment.wizard.post');

// Finish
//Route::get('/finish', [MainController::class, 'finish'])->name('finish');
