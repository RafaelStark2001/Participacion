<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\SeccionController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Alumno;
use App\Models\Seccion;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('docente', DocenteController::class);

Route::post('seccion/{seccion}/actualizar', [SeccionController::class, 'actualizarAlumnosSeccion'])
    ->name('seccion.actualizar-alumnos')
    ->middleware(['auth']);

Route::resource('seccion', SeccionController::class)->middleware(['auth']);

Route::post('alumno/{alumno}/actualizar', [AlumnoController::class, 'actualizarSeccionesAlumno'])
    ->name('alumno.actualizar-secciones')
    ->middleware(['auth']);

Route::resource('alumno', AlumnoController::class)->middleware(['auth']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
