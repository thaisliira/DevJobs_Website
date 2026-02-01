<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobListingController;

/**
 * Rota para retornar o content na pagina home
 */
Route::get('/', [HeroController::class, 'index'])->name('layouts.home');

/**
 * Rota para adc empresa nova na base de dados
 */
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store')->middleware('auth');

/**
 * Rota para adc vaga nova na base de dados
 */
Route::post('/jobs', [JobListingController::class, 'store'])->name('jobs.store')->middleware('auth');

/**
 * Rota para editar empresa na BD
 */
Route::put('/companies/{id}', [CompanyController::class, 'updateCompany'])->name('companies.updateCompany')->middleware('auth');

/**
 * Rota para editar vaga na BD
 */
Route::put('/jobsUpdate/{id}', [JobListingController::class, 'updateJob'])->name('jobs.updateJob')->middleware('auth');

/**
 * Rota que exibe as empresas da BD
 */
Route::get('/all-companies', [CompanyController::class, 'index'])->name('companies.index');

/**
 * Rota para que o botao delete apague as empresas
 */
Route::get('/delete-company/{id}', [CompanyController::class, 'deleteCompany'])->name('companies.delete')->middleware('auth');

/**
 * Rota para que o botao delete apague as vagas
 */
Route::get('/delete-job/{id}', [JobListingController::class, 'deleteJob'])->name('jobs.delete')->middleware('auth');

/**
 * Rota para a listagem global de vagas
 */
Route::get('/all-jobs', [JobListingController::class, 'index'])->name('jobs.index');

/**
 * Rota com as vagas representadas por cada empresa
 */
Route::get('/company/{id}/jobs', [CompanyController::class, 'showJobs'])->name('companies.show');

/**
 * Rota para ver o detalhe de uma vaga específica
 */
Route::get('/job/{id}', [JobListingController::class, 'showJobDetail'])->name('jobsid.show');

/**
 * Rota para pagina nao encontrada
 */
Route::fallback( function(){
    return '<h5>Ups, essa página não existe</h5>';});