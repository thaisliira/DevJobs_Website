@extends('layouts.home')
@section('content')

<div class="container py-5">
    <a href="{{ route('jobs.index') }}" class="text-muted text-decoration-none small mb-4 d-inline-block">
        <i class="bi bi-arrow-left me-1"></i> Voltar às vagas
    </a>

    <div class="stat-card p-5 mb-4">
        <div class="d-flex align-items-center gap-4 mb-4">
            <img src="{{ $job->image }}" style="width: 80px; height: 80px; object-fit: contain;">
            <div>
                <h1 class="text-white fw-bold mb-1">{{ $job->title }}</h1>
                <p class="text-purple mb-0">
                    <i class="bi bi-building me-1"></i> {{ $job->company->name }} 
                    <i class="bi bi-arrow-right-short"></i>
                </p>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-2 mb-4">
            <span class="badge-vagas"><i class="bi bi-geo-alt me-1"></i> {{ $job->company->city }}</span>
            <span class="badge-vagas"><i class="bi bi-briefcase me-1"></i> {{ ucfirst($job->work_type) }}</span>
            <span class="badge-vagas p-3" style="background: rgba(168, 85, 247, 0.1); border: 1px solid rgba(168, 85, 247, 0.2);">
                <i class="bi bi-cash-stack me-2 text-purple"></i> 
                <strong>{{ number_format($job->salary, 0, ',', '.') }} €</strong>
            </span>
        </div>

        <div class="d-flex gap-3">
            <button class="btn-neon-purple px-5 py-2 fw-bold">
                <i class="bi bi-send me-2"></i> Candidatar-me
            </button>
            <button class="btnx btnx--ghost px-4 py-2">
                <i class="bi bi-heart me-2"></i> Guardar vaga
            </button>
        </div>
    </div>

    <div class="stat-card p-4 mb-4">
        <h4 class="text-white mb-4"><i class="bi bi-briefcase text-purple me-2"></i> Descrição</h4>
        <p class="text-muted lead" style="font-size: 0.95rem; line-height: 1.6;">
            {{ $job->description }}
        </p>
    </div>

    <div class="stat-card p-4 mb-4">
        <h4 class="text-white mb-4"><i class="bi bi-check2-circle text-purple me-2"></i> Requisitos</h4>
        <ul class="list-unstyled d-flex flex-column">
            <!-- parte o texto onde houver um ponto final -->
            @foreach(array_filter(explode('.', $job->requirements)) as $requisito)
                <li class="text-muted d-flex align-items-start">
                    <i class="bi bi-check-circle-fill text-info me-3" style="font-size: 0.9rem;"></i>
                    <!-- exibe frase e coloca o ponto -->
                    <span>{{ trim($requisito) }}.</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="stat-card p-4 mb-4">
        <h4 class="text-white mb-4"><i class="bi bi-heart text-purple me-2"></i> Benefícios</h4>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex flex-column gap-4 h-100">
                    <div class="text-muted d-flex align-items-start" style="min-height: 80px;">
                        <i class="bi bi-heart-pulse-fill text-purple me-3 mt-1"></i>
                        <div>
                            <strong class="text-white d-block">Seguro de Saúde Burnoutinho</strong>
                            <small>Quando a ansiedade bater, pelo menos tens reembolso.</small>
                        </div>
                    </div>
                    <div class="text-muted d-flex align-items-start" style="min-height: 80px;">
                        <i class="bi bi-mortarboard-fill text-purple me-3 mt-1"></i>
                        <div>
                            <strong class="text-white d-block">Budget para Formação (€2000/ano)</strong>
                            <small>Aprende algo útil… de preferência pra nós.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column gap-4 h-100">
                    <div class="text-muted d-flex align-items-start" style="min-height: 80px;">
                        <i class="bi bi-laptop-fill text-purple me-3 mt-1"></i>
                        <div>
                            <strong class="text-white d-block">Equipamento à Escolha</strong>
                            <small>Porém depende. (Do budget, do stock...)</small>
                        </div>
                    </div>
                    <div class="text-muted d-flex align-items-start" style="min-height: 80px;">
                        <i class="bi bi-clock-fill text-purple me-3 mt-1"></i>
                        <div>
                            <strong class="text-white d-block">Horário Inflexível</strong>
                            <small>Não pagamos horas: usa o banco e agradece.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="stat-card p-4">
        <h4 class="text-white mb-4">Sobre a {{ $job->company->name }}</h4>
        <p class="text-muted mb-4">{{ $job->company->description }}</p>
        <a href="{{ route('companies.show', $job->company_id) }}" class="btn-neon-purple btn-sm px-4 py-2 text-decoration-none">
            Ver mais vagas da {{ $job->company->name }} →
        </a>
    </div>
</div>

@endsection