<?php

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\User\DocumentController as UserDocumentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->hasRole('user')) {
            return redirect()->route('user.documents.index');
        }

        return redirect()->route('editor.dashboard');
    })->name('dashboard');

    /**
     * RUTAS DE EDITOR
     */
    Route::middleware([EnsureUserHasRole::class . ':editor'])->prefix('/editor')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('editor.dashboard');

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
            Route::get('/create', [DocumentController::class, 'create'])->name('documents.create');
            Route::post('/', [DocumentController::class, 'store'])->name('documents.store');
            Route::get('/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
            Route::patch('/{document}', [DocumentController::class, 'update'])->name('documents.update');
            Route::delete('/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
        });
    });

    /**
     * RUTAS DE USUARIO
     */
    Route::middleware([EnsureUserHasRole::class . ':user'])->prefix('/usuario')->group(function () {
        Route::get('/documentos', [UserDocumentController::class, 'index'])->name('user.documents.index');
    });
});

require __DIR__.'/auth.php';
