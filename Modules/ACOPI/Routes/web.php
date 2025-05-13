<?php




Route::middleware(['lang'])->group(function () {
    Route::prefix('acopi')->group(function () {

        // Rutas principales
        Route::get('/index', 'ACOPIController@index')->name('cefa.acopi.index');
        Route::get('/admin/welcome', 'ACOPIController@admin')->name('acopi.admin.welcome');

        // Rutas para Material
        Route::controller(MaterialController::class)->group(function () {
            Route::get('/admin/material', 'index')->name('acopi.admin.material.index');
            Route::get('/admin/material/create', 'create')->name('acopi.admin.material.create');
            Route::post('/admin/material/store', 'store')->name('acopi.admin.material.store');
            Route::get('/admin/material/edit/{id}', 'edit')->name('acopi.admin.material.edit');
            Route::put('/admin/material/update/{id}', 'update')->name('acopi.admin.material.update');
            Route::delete('/admin/material/destroy/{id}', 'destroy')->name('acopi.admin.material.destroy');
        });

        // Rutas para Cellar
        Route::controller(CellarController::class)->group(function () {
            Route::get('/cellar', 'index')->name('acopi.admin.cellar.index');
            Route::get('/cellar/create', 'create')->name('acopi.admin.cellar.create');
            Route::post('/cellar', 'store')->name('acopi.admin.cellar.store');
            Route::get('/cellar/{id}/edit', 'edit')->name('acopi.admin.cellar.edit');
            Route::put('/cellar/{id}', 'update')->name('acopi.admin.cellar.update');
            Route::delete('/cellar/{id}', 'destroy')->name('acopi.admin.cellar.destroy');
        });

        // Rutas para Classificacion
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
