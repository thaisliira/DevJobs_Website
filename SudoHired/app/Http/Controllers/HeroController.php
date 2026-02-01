<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Http\Request;

/**
 * controller para o conteudo da pagina principal
 */
class HeroController extends Controller
{
    public function index() {
    $totalCompanies = Company::count();
    $totalJobs = JobListing::count();

    // Obter empresas(4) com o número de vagas de cada e apresenta as ultimas empresas postadas 
    $featuredCompanies = Company::withCount('jobs')->latest()->take(4)->get();

    return view('layouts.hero', compact('totalCompanies', 'totalJobs', 'featuredCompanies'));
}
}
