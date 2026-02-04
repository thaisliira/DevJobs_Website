@extends('layouts.home') 
@section('content')
<div class="hero-section d-flex align-items-center justify-content-center text-center">
    <div class="container">
        <div class="mb-4">
            <span class="badge-premium">✨ Portal Premium de Vagas Tech</span>
        </div>
        <h1 class="main-title mb-4">
            <span class="text-gradient">A Tua Próxima Oportunidade<br> Tech</span>
        </h1>
        <p class="hero-subtitle mb-5">
            Descobre empresas tecnológicas de ponta e vagas que combinam <br class="d-none d-md-block">
            com o teu perfil. Plataforma com as melhores <br class="d-none d-md-block">
            oportunidades em Portugal.
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('companies.index') }}" class="btn btn-neon-purple px-4 py-2">
                🏢 Explorar Empresas
            </a>
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-custom px-4 py-2">
                💼 Ver Vagas <span class="ms-2">→</span>
            </a>
        </div>
    </div>
</div> <div class="container mb-5">
    <div class="row g-4 justify-content-center text-center">
        <div class="col-md-3">
            <div class="stat-card">
                <!-- variáveis definidas no HeroController -->
                <h2 class="stat-number">{{ $totalCompanies }}+</h2>
                <p class="stat-label">Empresas</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h2 class="stat-number">{{ $totalJobs }}+</h2>
                <p class="stat-label">Vagas Abertas</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h2 class="stat-number">100%</h2>
                <p class="stat-label">Remote-friendly</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="section-title mt-3">Empresas em Destaque</h2>
        <p class="section-subtitle">As melhores empresas tech estão à procura de talento</p>
    </div>

    <div class="row g-4">
        @foreach($featuredCompanies as $company)
        <div class="col-md-3">
            <div class="featured-card">
                <div class="card-icon">
                    @if($company->logo)
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" style="width: 70px; height: 50px; object-fit: contain;">
                    @else
                        🌌
                    @endif
                </div>
                <h4 class="card-title">{{ $company->name }}</h4>
                <!-- limite para a descriçao -->
                <p class="card-text">{{ Str::limit($company->description, 80) }}</p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <span class="badge-vagas">{{ $company->jobs_count }} vagas</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection