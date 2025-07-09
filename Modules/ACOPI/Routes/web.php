<?php

use Illuminate\Support\Facades\Route;
use Modules\ACOPI\Http\Controllers\ACOPIController;
use Modules\ACOPI\Http\Controllers\CellarController;
use Modules\ACOPI\Http\Controllers\ClassificationController;
use Modules\ACOPI\Http\Controllers\MaterialController;

Route::middleware(['web', 'lang'])->group(function () {
    Route::prefix('acopi')->group(function () {

        // Rutas principales
        Route::get('/index', [ACOPIController::class, 'index'])->name('cefa.acopi.index');
        Route::get('/admin/welcome', [ACOPIController::class, 'admin'])->name('acopi.admin.welcome');

        // Rutas para Material
        Route::get('/admin/material', [MaterialController::class, 'index'])->name('acopi.admin.material.index');
        Route::get('/admin/material/listas', [MaterialController::class, 'showList'])->name('acopi.admin.material.listas');
        Route::get('/admin/material/create', [MaterialController::class, 'create'])->name('acopi.admin.material.create');
        Route::post('/admin/material/store', [MaterialController::class, 'store'])->name('acopi.admin.material.store');
        Route::get('/admin/material/{id}/edit', [MaterialController::class, 'edit'])->name('acopi.admin.material.edit');
        Route::put('/admin/material/update/{id}', [MaterialController::class, 'update'])->name('acopi.admin.material.update');
        Route::delete('/admin/material/destroy/{id}', [MaterialController::class, 'destroy'])->name('acopi.admin.material.destroy');

        // Rutas para Cellar (Bodega)
        Route::get('/admin/cellar', [CellarController::class, 'index'])->name('acopi.admin.cellar.index');
        Route::get('/admin/cellar/create', [CellarController::class, 'create'])->name('acopi.admin.cellar.create');
        Route::post('/admin/cellar', [CellarController::class, 'store'])->name('acopi.admin.cellar.store');
        Route::get('/admin/cellar/{id}/edit', [CellarController::class, 'edit'])->name('acopi.admin.cellar.edit');
        Route::put('/admin/cellar/{id}', [CellarController::class, 'update'])->name('acopi.admin.cellar.update');
        Route::delete('/admin/cellar/{id}', [CellarController::class, 'destroy'])->name('acopi.admin.cellar.destroy');

        // Rutas para Clasificación
        Route::controller(ClassificationController::class)->group(function () {
            Route::get('/classificacion', 'index')->name('acopi.admin.classificacion.index');
            Route::get('/classificacion/create', 'create')->name('acopi.admin.classificacion.create');
            Route::post('/classificacion', 'store')->name('acopi.admin.classificacion.store');
            Route::get('/classificacion/{id}/edit', 'edit')->name('acopi.admin.classificacion.edit');
            Route::put('/classificacion/{id}', 'update')->name('acopi.admin.classificacion.update');
            Route::delete('/classificacion/{id}', 'destroy')->name('acopi.admin.classificacion.destroy');
        });

    });
});
