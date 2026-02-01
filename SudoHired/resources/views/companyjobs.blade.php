@extends('layouts.home')
@section('content')
<!-- VIEW QUE APARECE A EMPRESA E SUAS RESPECTIVAS VAGAS -->
<div class="container py-5 nebula-theme">
    <a href="{{ route('companies.index') }}" class="text-muted text-decoration-none small mb-4 d-inline-block">
        <i class="bi bi-arrow-left me-1"></i> Voltar às empresas
    </a>
    <div class="company-profile-card d-flex align-items-center mb-5 p-4">
        <!-- imagem que vem da pasta storage -->
        <img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100" class="rounded-3 me-4 shadow-neon" style="object-fit: cover;">
        <div>
            <h1 class="display-5 fw-bold text-white">{{ $company->name }}</h1>
            <p class="text-secondary fs-5 mb-0">{{ $company->description }}</p>
            <div class="mt-2">
                <span class="badge-custom">📍 {{ $company->city }}</span>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white fw-light">Vagas Disponíveis</h4>
        <span class="text-secondary small">{{ $company->jobs->count() }} vagas encontradas</span>
    </div>

    <div class="row">
    @forelse($company->jobs as $job)
        <div class="col-12 mb-3">
            <div class="job-item-list p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                
                <div class="job-info-main">
                    <div class="d-flex align-items-center mb-2">
                        <!-- imagem que vem do link que está na BD -->
                        <img src="{{ $job->image }}" style="width: 45px; height: 45px; object-fit: contain;">
                        <h5 class="text-white fw-bold mb-0 me-3">{{ $job->title }}</h5>
                        <span class="badge-work-type {{ $job->work_type }}">
                            <!-- transforma o que vem na base de dados em uma string toda em maiúscula -->
                            {{ ucfirst($job->work_type) }}
                        </span>
                    </div>
                    
                    <h6 class="salary-tag mb-3"> 💰 {{ number_format($job->salary, 2, ',', '.') }}€</h6>
                    
                    <div class="requirements-text">
                        <p class="text-secondary small mb-0">
                            <strong>Requisitos:</strong> 
                            <!-- limite para nao aparecer os requisitos todo -->
                            <span class="text-muted">{{ Str::limit($job->requirements, 150) }}</span>
                        </p>
                    </div>
                </div>

                <div class="job-actions text-md-end mt-3 mt-md-0">
                    <div class="mb-3">
                        <span class="text-secondary d-block small">📅 Expira em:</span>
                        <!-- altera o formato da data  -->
                        <span class="text-white small">{{ \Carbon\Carbon::parse($job->inscription_end_date)->format('d/m/Y') }}</span>
                    </div>
                    <a href="{{ route('jobsid.show', $job->id) }}" class="btn-nebula px-4">Ver Detalhes →</a>
                </div>

            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-secondary italic">Esta empresa ainda não publicou nenhuma vaga.</p>
        </div>
    @endforelse
</div>
</div>
@endsection