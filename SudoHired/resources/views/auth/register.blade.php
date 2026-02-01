@extends('layouts.home')

@section('content')
<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="auth-card p-4 p-md-5">
        <div class="text-center mb-4">
            <div class="brand d-flex align-items-center justify-content-center gap-2 mb-3">
                <img class="brand-logo" src="{{ asset('img/logodev.png') }}" alt="DevJobs" width="70">
                <span class="text-gradient" style="font-weight: bold; font-size: 1.5rem;">DevJobs</span>
            </div>
            <h2 class="auth-title">Cria a tua conta</h2>
            <p class="auth-subtitle">Junta-te à comunidade tech</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label-custom">Nome Completo</label>
                <div class="input-group-custom">
                    <span class="input-icon"><i class="bi bi-person"></i></span>
                    <input id="name" type="text" name="name" class="form-control-neon" required autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label-custom">Email</label>
                <div class="input-group-custom">
                    <span class="input-icon"><i class="bi bi-envelope"></i></span>
                    <input id="email" type="email" name="email" class="form-control-neon" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label-custom">Password</label>
                <div class="input-group-custom">
                    <span class="input-icon"><i class="bi bi-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control-neon" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label-custom">Confirmar Password</label>
                <div class="input-group-custom">
                    <span class="input-icon"><i class="bi bi-shield-lock"></i></span>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control-neon" required>
                </div>
            </div>

            <button type="submit" class="btn-neon-purple w-100 py-3 mb-4">
                Criar conta
            </button>

            <div class="text-center">
                <p class="auth-footer-text">Já tens conta? <a href="{{ route('login') }}" class="register-link">Faz login</a></p>
            </div>

            <div class="text-center mt-3">
                <small style="font-size: 0.75rem; color: rgba(255,255,255,0.7);">
                    Ao criares uma conta, concordas com os nossos 
                    <a href="#" class="register-link" style="font-size: 0.75rem;">Termos de Serviço</a> e 
                    <a href="#" class="register-link" style="font-size: 0.75rem;">Política de Privacidade</a>.
                </small>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger-custom mt-3">
                <ul class="mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection