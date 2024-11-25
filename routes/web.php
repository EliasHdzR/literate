<?php

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::group('/plantillas', function(){
        Route::get('/', [TemplateController::class, 'index'])->name('templates.index');
        Route::get('/create', [TemplateController::class, 'create'])->name('templates.create');
        Route::post('/', [TemplateController::class, 'store'])->name('templates.store');
        Route::get('/{template}', [TemplateController::class, 'show'])->name('templates.show');
        Route::get('/{template}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
        Route::patch('/{template}', [TemplateController::class, 'update'])->name('templates.update');
        Route::delete('/{template}', [TemplateController::class, 'destroy'])->name('templates.destroy');
    });

    Route::controller(DocumentController::class)->group(function (){
        Route::get('/documentos', 'index')->name('documents.index'); 
        Route::get('/documentos/create', 'create')->name('documents.create'); 
        Route::post('/documentos', 'store')->name('documents.store'); 
        Route::get('/documentos/{document}/edit', 'edit')->name('documents.edit');
        Route::patch('/documentos/{document}', 'update')->name('documents.update');
        Route::delete('/documentos/{document}', 'destroy')->name('documents.destroy');
    });
    
});

require __DIR__.'/auth.php';
