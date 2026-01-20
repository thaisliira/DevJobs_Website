<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});


// Nova rota que encaminha pro dashboard após usuario fazer autenticacao no sistema
Route::get('/dashboard', [CompanyController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

// Rota para adc empresa nova na base de dados
Route::post('/companies', [CompanyController::class, 'store'])
    ->name('companies.store')
    ->middleware('auth');

// Rota para que o botao delete apague as empresas
Route::get('/delete-company/{id}', [CompanyController::class, 'deleteCompany'])->name('companies.delete');

// Rota com as vagas representadas por cada empresa
Route::get('/company/{id}/jobs', [CompanyController::class, 'showJobs'])->name('companies.show');