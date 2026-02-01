@extends('layouts.home')

@section('content')

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-start mb-5">
        <div>
            @auth
                <h1 class="auth-title mb-2">Olá, {{ Auth::user()->name }} 👋</h1>
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-shield-lock-fill text-purple"></i>
                    <span class="nav-muted">Tipo de conta:</span>
                    <span class="badge-vagas">{{ Auth::user()->is_admin ? 'Administrador' : 'Utilizador' }}</span>
                </div>
            @endauth
        </div>
    </div>

    <div class="row g-4">
        @auth
            <div class="col-lg-3">
                <div class="stat-card p-4 mb-4">
                    <h6 class="footer-title mb-4"><i class="bi bi-people me-2"></i> Menu</h6>

                    <nav class="d-flex flex-column gap-2">
                        <a href="{{ route('companies.index') }}" class="nav-link-dashboard">
                            <i class="bi bi-building me-2"></i> Empresas
                        </a>
                        <a href="{{ route('jobs.index') }}" class="nav-link-dashboard">
                            <i class="bi bi-briefcase me-2"></i> Vagas
                        </a>
                        @auth
                            @if(Auth::user()->is_admin)
                                <a href="{{ route('applications.index') }}" class="nav-link-dashboard active">
                                    <i class="bi bi-file-earmark-text me-2"></i> Candidaturas
                                </a>
                            @endif
                        @endauth
                    </nav>
                    <hr class="my-4" style="border-color: rgba(255,255,255,0.05)">
                    <h6 class="footer-title mb-3">Permissões</h6>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li class="nav-muted small"><i class="bi bi-person me-2"></i> Visualizar empresas/vagas</li>
                        <li class="nav-muted small"><i class="bi bi-send me-2"></i> Candidatar-se</li>
                        <li class="nav-muted small"><i class="bi bi-download me-2"></i> Baixar Curriculos</li>
                    </ul>
                </div>
            </div>
        @endauth

        <div class="@auth col-lg-9 @endauth @guest col-12 @endguest">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="section-title mb-0">
                    <i class="bi bi-folder2-open me-2"></i> Candidaturas Recebidas
                </h3>
            </div>

            <div class="table-responsive mb-5">
                <table class="tablex">
                    <thead>
                        <tr>
                            <th>Vaga</th>
                            <th>Candidato</th>
                            <th>Email</th>
                            <th>Data Envio</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($applications as $app)
                            <tr>
                                <td>
                                    <strong>{{ $app->jobListing->title }}</strong>
                                    <div class="small nav-muted">{{ $app->jobListing->company->name ?? 'Empresa' }}</div>
                                </td>
                                
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        {{ $app->user->name }}
                                    </div>
                                </td>
                                
                                <td class="muted">{{ $app->user->email }}</td>
                                
                                <td class="muted">{{ $app->created_at->format('d/m/Y') }}</td>

                                <td class="text-end">
                                    <a href="{{ route('application.download', $app->id) }}" class="btnx btnx--info btnx--sm d-inline-flex align-items-center">
                                        <i class="bi bi-download me-1"></i> Baixar PDF
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center muted py-5">
                                    <i class="bi bi-inbox fs-1 d-block mb-3 opacity-50"></i>
                                    Não existem candidaturas registradas no momento.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection