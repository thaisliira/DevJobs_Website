@extends('layouts.home')
@section('content')
<div class="container py-5">
    <div class="d-flex align-items-center mb-4">
        <img src="{{ asset('storage/' . $company->logo) }}" width="80" height="80" class="rounded-circle me-3 shadow-sm" style="object-fit: cover;">
        <div>
            <h2 class="mb-0">{{ $company->name }}</h2>
            <p class="text-muted mb-0">{{ $company->description }}</p>
        </div>
    </div>

    <h4 class="mb-3">Vagas Disponíveis:</h4>
    <div class="row">
        @forelse($company->jobs as $job)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-title fw-bold">{{ $job->title }}</h5>
                            <span class="badge bg-{{ $job->work_type == 'remote' ? 'success' : ($job->work_type == 'hybrid' ? 'warning' : 'primary') }}">
                                {{ ucfirst($job->work_type) }}
                            </span>
                        </div>
                        <h6 class="text-primary fw-bold">{{ number_format($job->salary, 2, ',', '.') }}€</h6>
                        <hr>
                        <p class="card-text"><strong>Requisitos:</strong></p>
                        <p class="text-muted small">{!! nl2br(e($job->requirements)) !!}</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <small class="text-muted">Inscrições até: {{ \Carbon\Carbon::parse($job->inscription_end_date)->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="alert alert-light">Esta empresa ainda não publicou nenhuma vaga absurda.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection