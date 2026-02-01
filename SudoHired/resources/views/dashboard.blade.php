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
                        <a href="{{ route('companies.index') }}" class="nav-link-dashboard active">
                            <i class="bi bi-building me-2"></i> Empresas
                        </a>
                        <a href="{{ route('jobs.index') }}" class="nav-link-dashboard">
                            <i class="bi bi-briefcase me-2"></i> Vagas
                        </a>
                        @auth
                            @if(Auth::user()->is_admin)
                                <a href="{{ route('applications.index') }}" class="nav-link-dashboard">
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
                    </ul>
                </div>
            </div>
        @endauth

         <!-- delimita que a sidebar só sera exibida se o user estiver logado! o -3 correspondem a sidebar -->
        <div class="@auth col-lg-9 @endauth @guest col-12 @endguest">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="section-title mb-0">
                    @auth
                        {{ Auth::user()->is_admin ? 'Gestão de Empresas' : 'Empresas' }}
                    @endauth
                    @guest
                        Empresas
                    @endguest
                </h3>

                @auth
                    @if(Auth::user()->is_admin)
                        <button class="btn-neon-purple px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalAddCompany">
                            <i class="bi bi-plus-lg me-2"></i> Adicionar Empresa
                        </button>
                    @endif
                @endauth
            </div>

            <div class="table-responsive mb-5">
                <table class="tablex">
                    <thead>
                        <tr>
                            <th style="width: 50px;"></th>
                            <th>Empresa</th>
                            <th>Descrição</th>
                            <th>Cidade</th>
                            <th class="text-center">Vagas</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($companies as $company)
                            <tr>
                                <td>
                                    @if($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" width="40" height="40" class="avatar" style="object-fit: cover;">
                                    @else
                                        <img src="https://placehold.co/40" width="40" height="40" class="avatar">
                                    @endif
                                </td>
                                <td><strong>{{ $company->name }}</strong></td>
                                <td class="muted">{{ Str::limit($company->description, 40) }}</td>
                                <td class="muted">{{ $company->city }}</td>
                                <td class="text-center"><span class="pill">{{ $company->jobs_count }}</span></td>

                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('companies.show', $company->id) }}" class="btnx btnx--info btnx--sm d-flex align-items-center">
                                            <i class="bi bi-eye me-1"></i> Visualizar
                                        </a>
                                        @auth
                                            @if(Auth::user()->is_admin)
                                                <button class="btnx btnx--warn btnx--sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalEditCompany{{ $company->id }}">
                                                    <i class="bi bi-pencil me-1"></i> Editar
                                                </button>
                                                <button class="btnx btnx--danger btnx--sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $company->id }}">
                                                    <i class="bi bi-trash me-1"></i> Apagar
                                                </button>
                                            @endif
                                        @endauth
                                    </div>
                                </td>
                            </tr>
                            <!-- modal para editar a empresa -->
                            @auth
                                @if(Auth::user()->is_admin)
                                    <div class="modal fade" id="modalEditCompany{{ $company->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modalx text-start">
                                                <div class="modal-header modalx__header">
                                                    <h5 class="modal-title">Editar Empresa: {{ $company->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('companies.updateCompany', $company->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Nome da Empresa</label>
                                                            <input type="text" name="name" class="inputx" value="{{ $company->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Descrição</label>
                                                            <textarea name="description" class="inputx" rows="3" required>{{ $company->description }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Cidade</label>
                                                            <input type="text" name="city" class="inputx" value="{{ $company->city }}" required>
                                                        </div>
                                                        <div class="mb-3 text-center">
                                                            <label class="form-label labelx d-block text-start">Logo Atual</label>
                                                            @if($company->logo)
                                                                <img src="{{ asset('storage/' . $company->logo) }}" width="60" class="avatar mb-2">
                                                            @endif
                                                            <input type="file" name="logo" class="inputx" accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer modalx__footer">
                                                        <button type="button" class="btnx btnx--ghost" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btnx btnx--primary">Salvar Alterações</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal para excluir uma empresa -->
                                    <div class="modal fade" id="modalDelete{{ $company->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modalx text-center py-4">
                                                <div class="danger-icon mb-3">
                                                    <i class="bi bi-exclamation-triangle-fill" style="font-size: 3rem;"></i>
                                                </div>
                                                <h5>Confirmar Exclusão</h5>
                                                <p class="muted">Apagar <strong>{{ $company->name }}</strong> e vagas associadas?</p>
                                                <div class="modal-footer modalx__footer d-flex justify-content-center">
                                                    <button type="button" class="btnx btnx--ghost" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="{{ route('companies.delete', $company->id) }}" class="btnx btnx--danger btnx--wide">Apagar tudo</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            @endauth

                        @empty
                            <tr>
                                <td colspan="6" class="text-center muted py-4">Nenhuma empresa encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- modal para adc uma empresa -->
@auth
    @if(Auth::user()->is_admin)
        <div class="modal fade" id="modalAddCompany" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modalx text-start">
                    <div class="modal-header modalx__header">
                        <h5 class="modal-title">Registrar Nova Empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label labelx">Nome da Empresa</label>
                                <input type="text" name="name" class="inputx" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Descrição</label>
                                <textarea name="description" class="inputx" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Cidade</label>
                                <input type="text" name="city" class="inputx" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Logo (Imagem)</label>
                                <input type="file" name="logo" class="inputx" accept="image/*">
                            </div>
                        </div>

                        <div class="modal-footer modalx__footer">
                            <button type="button" class="btnx btnx--ghost" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btnx btnx--primary">Guardar Empresa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endauth

@endsection
