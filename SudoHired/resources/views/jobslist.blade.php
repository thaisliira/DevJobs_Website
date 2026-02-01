@extends('layouts.home')
@section('content')

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-start mb-5">
        <div>
            <!-- verificacao de autenticacao do user -->
            @auth
                <h1 class="auth-title mb-2">Olá, {{ Auth::user()->name }} 👋</h1>
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-shield-lock-fill text-purple"></i>
                    <span class="nav-muted">Tipo de conta:</span>
                    <!-- verifica se é um admin ou user comum -->
                    <span class="badge-vagas">{{ Auth::user()->is_admin ? 'Administrador' : 'Utilizador' }}</span>
                </div>
            @endauth
        </div>
    </div>
    <div class="row g-4">
        <!-- sidebar apenas para users autenticados -->
        @auth
            <div class="col-lg-3">
                <div class="stat-card p-4 mb-4">
                    <h6 class="footer-title mb-4"><i class="bi bi-people me-2"></i> Menu</h6>
                    <nav class="d-flex flex-column gap-2">
                        <a href="{{ route('companies.index') }}" class="nav-link-dashboard">
                            <i class="bi bi-building me-2"></i> Empresas
                        </a>
                        <a href="{{ route('jobs.index') }}" class="nav-link-dashboard active">
                            <i class="bi bi-briefcase me-2"></i> Vagas
                        </a>
                        <a href="#" class="nav-link-dashboard">
                            <i class="bi bi-file-earmark-text me-2" aria-disabled="true"></i> Candidaturas
                        </a>
                    </nav>

                    <hr class="my-4" style="border-color: rgba(255,255,255,0.05)">

                    <h6 class="footer-title mb-3">Permissões</h6>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                        <li class="nav-muted small"><i class="bi bi-person me-2"></i> Visualizar empresas/vagas</li>
                        <li class="nav-muted small"><i class="bi bi-send me-2"></i> Candidatar-se a vagas</li>
                    </ul>
                </div>
            </div>
        @endauth

        <!-- col-12 p/ visitante, col-lg-9 p/ user logado -->
        <div class="@auth col-lg-9 @endauth @guest col-12 @endguest">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="section-title mb-0">
                    @auth
                        {{ Auth::user()->is_admin ? 'Gestão de Vagas' : 'Vagas' }}
                    @endauth
                    <!-- utilizado para visitante nao logado -->
                    @guest
                        Vagas
                    @endguest
                </h3>

                <!-- botao de adc vaga so para admin -->
                @auth
                    @if(Auth::user()->is_admin)
                        <button class="btn-neon-purple px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalAddJob">
                            <i class="bi bi-plus-lg me-2"></i> Adicionar Vaga
                        </button>
                    @endif
                @endauth
            </div>

            <div class="table-responsive mb-5">
                <table class="tablex">
                    <thead>
                        <tr>
                            <th style="width: 50px;"></th>
                            <th>Título</th>
                            <th>Salário</th>
                            <th>Tipo</th>
                            <th>Requisitos</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- buscando dados na BD | com o forelse é possivel adc mensagem no caso da base de dados estar vazia utilizando o empty sem o if/else -->
                        @forelse($jobs as $job)
                            <tr>
                                <td>
                                    <img
                                        src="{{ $job->image ?? 'https://placehold.co/40' }}"
                                        style="width: 45px; height: 45px; object-fit: contain;"
                                        alt="Imagem da vaga"
                                    >
                                </td>

                                <td><strong>{{ $job->title }}</strong></td>
                                <!-- para alterar o formato de exibicao do salario com decimais -->
                                <td class="muted">{{ number_format($job->salary, 2, ',', '.') }} €</td>
                                <td class="muted">{{ $job->work_type }}</td>
                                <!-- para nao exibir todo o texto dos requisitos -->
                                <td class="muted">{{ Str::limit($job->requirements, 40) }}</td>
                                <td class="text-end">
                                    <a href="{{ route('jobsid.show', $job->id) }}" class="btnx btnx--info btnx--sm" title="Visualizar">
                                        <i class="bi bi-eye"></i> Visualizar
                                    </a>

                                   <!-- botoes apenas visiveis para administradores -->
                                    @auth
                                        @if(Auth::user()->is_admin)
                                            <button class="btnx btnx--warn btnx--sm" data-bs-toggle="modal" data-bs-target="#modalEditJob{{ $job->id }}">
                                                Editar
                                            </button>
                                            <button class="btnx btnx--danger btnx--sm" data-bs-toggle="modal" data-bs-target="#modalDeleteJob{{ $job->id }}">
                                                Apagar
                                            </button>
                                        @endif
                                    @endauth
                                </td>
                            </tr>

                            <!-- modal de editar vaga -->
                            @auth
                                @if(Auth::user()->is_admin)
                                    <div class="modal fade" id="modalEditJob{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modalx text-start">
                                                <div class="modal-header modalx__header">
                                                    <h5 class="modal-title">Editar Vaga: {{ $job->title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- o form só consegue ter 2 metodos: get ou post -->
                                                <form action="{{ route('jobs.updateJob', $job->id) }}" method="POST">
                                                <!-- protecao do formulario com criacao de chave token que coincide com a chave do user logado     -->
                                                @csrf
                                                <!-- aqui determinamos o que realmente vai ser o metodo: delete, post, get ou put -->
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Nome da Vaga</label>
                                                            <input type="text" name="title" class="inputx" value="{{ $job->title }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Requisitos</label>
                                                            <textarea name="requirements" class="inputx" rows="3" required>{{ $job->requirements }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Descrição </label>
                                                            <textarea name="description" class="inputx" rows="4" required>{{ $job->description}}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Tipo de Trabalho</label>
                                                            <select name="work_type" class="inputx" required>
                                                                <option value="remote" @selected($job->work_type == 'remote')>Remote</option>
                                                                <option value="hybrid" @selected($job->work_type == 'hybrid')>Hybrid</option>
                                                                <option value="onsite" @selected($job->work_type == 'onsite')>On-site</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Salário</label>
                                                            <input type="number" step="0.01" name="salary" class="inputx" value="{{ $job->salary }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Link da Imagem</label>
                                                            <input type="url" name="image" class="inputx" value="{{ $job->image }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label labelx">Fim das Inscrições</label>
                                                            <input type="date" name="inscription_end_date" class="inputx" value="{{ $job->inscription_end_date }}" required>
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

                                    <!-- modal e confirmacao para apagar uma vaga -->
                                    <div class="modal fade" id="modalDeleteJob{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modalx text-center py-4">
                                                <div class="danger-icon mb-3">
                                                    <i class="bi bi-exclamation-triangle-fill" style="font-size: 3rem;"></i>
                                                </div>
                                                <h5>Confirmar Exclusão</h5>
                                                <p class="muted">Isto apagará <strong>{{ $job->title }}</strong>.</p>
                                                <div class="modal-footer modalx__footer d-flex justify-content-center">
                                                    <button type="button" class="btnx btnx--ghost" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="{{ route('jobs.delete', $job->id) }}" class="btnx btnx--danger btnx--wide">Apagar tudo</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        <!-- no caso da base de dados estar vazia -->
                        @empty
                            <tr>
                                <td colspan="6" class="text-center muted py-4">Nenhuma vaga encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal de adc uma vaga -->
@auth
    @if(Auth::user()->is_admin)
        <div class="modal fade" id="modalAddJob" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modalx text-start">
                    <div class="modal-header modalx__header">
                        <h5 class="modal-title">Registrar Nova Vaga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label labelx">Nome da Vaga</label>
                                <input type="text" name="title" class="inputx" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Requisitos</label>
                                <textarea name="requirements" class="inputx" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Descrição </label>
                                <textarea name="description" class="inputx" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Tipo de Trabalho</label>
                                <select name="work_type" class="inputx" required>
                                    <option value="remote">Remote</option>
                                    <option value="hybrid">Hybrid</option>
                                    <option value="onsite">On-site</option>
                                </select>
                            </div>

                            <div class="mb-3">
                            <label class="form-label labelx">Fim das Inscrições</label>
                            <input type="date" name="inscription_end_date" class="inputx" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Salário</label>
                                <input type="number" step="0.01" name="salary" class="inputx" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label labelx">Empresa</label>
                                <select name="company_id" class="inputx" required>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="text-white">Link da Imagem da Vaga</label>
                                <input type="url" name="image" class="form-control" placeholder="https://exemplo.com/imagem.png">
                            </div>
                        </div>

                        <div class="modal-footer modalx__footer">
                            <button type="button" class="btnx btnx--ghost" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btnx btnx--primary">Guardar Vaga</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endauth
@endsection
