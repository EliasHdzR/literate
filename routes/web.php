<?php

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::group(['prefix' => '/plantillas'], function(){
        Route::get('/', [TemplateController::class, 'index'])->name('templates.index');
        Route::get('/create', [TemplateController::class, 'create'])->name('templates.create');
        Route::post('/', [TemplateController::class, 'store'])->name('templates.store');
        Route::get('/{template}', [TemplateController::class, 'show'])->name('templates.show');
        Route::get('/{template}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
        Route::patch('/{template}', [TemplateController::class, 'update'])->name('templates.update');
        Route::delete('/{template}', [TemplateController::class, 'destroy'])->name('templates.destroy');
    });

    Route::group(['prefix' => '/documentos'], function (){
        Route::get('/', [DocumentController::class, 'index'])->name('documents.index');
        Route::post('/create', [DocumentController::class, 'create'])->name('documents.create');
        Route::post('/', [DocumentController::class, 'store'])->name('documents.store');
        Route::get('/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
        Route::patch('/{document}', [DocumentController::class, 'update'])->name('documents.update');
        Route::get('/documents/{id}/export', [DocumentController::class, 'export'])->name('documents.export');
        Route::delete('/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    });

});

require __DIR__.'/auth.php';
