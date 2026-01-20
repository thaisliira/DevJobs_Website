@extends('layouts.home') 
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="panel">
                <div class="panel__header d-flex justify-content-between align-items-center">
                    <h4 class="panel__title mb-0">Painel de Controlo</h4>

                    @if(Auth::user()->is_admin)
                        <button type="button" class="btnx btnx--ghost btnx--sm" data-bs-toggle="modal" data-bs-target="#modalAddCompany">
                            + Nova Empresa
                        </button>
                    @endif
                </div>

                <div class="panel__body">

                    <div class="notice mb-4">
                        <h3 class="notice__title">👋 Olá, <b>{{ Auth::user()->name }}</b>!</h3>

                        @if(Auth::user()->is_admin)
                            <p class="notice__meta notice__meta--ok mb-0"><b>Administrador(a)</b></p>
                        @else
                            <p class="notice__meta mb-0">Bem-vindo ao SudoHired. Vê as vagas abaixo.</p>
                        @endif
                    </div>

                    <h5 class="section-title mb-3">Empresas Parceiras</h5>

                    <div class="table-responsive">
                        <table class="tablex">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">Logo</th>
                                    <th>Empresa</th>
                                    <th>Descrição</th>
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

                                        <td class="text-center">
                                            <span class="pill">{{ $company->jobs_count }}</span>
                                        </td>

                                        <td class="text-end">
                                            <a href="{{ route('companies.show', $company->id) }}" class="btnx btnx--info btnx--sm" title="Visualizar Vagas">
                                                <i class="bi bi-eye"></i> Visualizar
                                            </a>

                                            @if(Auth::user()->is_admin)
                                                <button class="btnx btnx--warn btnx--sm" data-bs-toggle="modal" data-bs-target="#modalEditCompany{{ $company->id }}">
                                                    Editar
                                                </button>

                                                <button type="button" class="btnx btnx--danger btnx--sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $company->id }}">
                                                    Apagar
                                                </button>

                                                <div class="modal fade" id="modalDelete{{ $company->id }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content modalx">
                                                            <div class="modal-header modalx__header">
                                                                <h5 class="modal-title">Confirmar Exclusão</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body text-center py-4">
                                                                <div class="danger-icon mb-3">
                                                                    <i class="bi bi-exclamation-triangle-fill" style="font-size: 3rem;"></i>
                                                                </div>
                                                                <h5>Tens a certeza?</h5>
                                                                <p class="muted">Isto apagará <strong>{{ $company->name }}</strong> e todas as vagas associadas.</p>
                                                            </div>

                                                            <div class="modal-footer modalx__footer d-flex justify-content-center">
                                                                <button type="button" class="btnx btnx--ghost" data-bs-dismiss="modal">Cancelar</button>
                                                                <a href="{{ route('companies.delete', $company->id) }}" class="btnx btnx--danger btnx--wide">
                                                                    Apagar tudo
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center muted py-4">Nenhuma empresa encontrada.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA ADICIONAR UMA EMPRESA -->
<div class="modal fade" id="modalAddCompany" tabindex="-1" aria-labelledby="modalAddCompanyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modalx">
            <div class="modal-header modalx__header">
                <h5 class="modal-title" id="modalAddCompanyLabel">Registar Nova Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
@endsection
