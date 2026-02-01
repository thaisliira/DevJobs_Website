@extends('layouts.home')

@section('content')
<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="auth-card p-4 p-md-5">
        <div class="text-center mb-4">
            <div class="brand d-flex align-items-center justify-content-center gap-2 mb-3">
                <img class="brand-logo" src="{{ asset('img/logodev.png') }}" alt="DevJobs" width="70">
                <span class="text-gradient" style="font-weight: bold; font-size: 1.5rem;">DevJobs</span>
            </div>
            
            <h2 class="auth-title">Bem-vindo de volta</h2>
            <p class="auth-subtitle">Entra na tua conta DevJobs</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label-custom">Email</label>
                <div class="input-group-custom">
                    <span class="input-icon"><i class="bi bi-envelope"></i></span>
                    <input id="email" type="email" name="email" class="form-control-neon" required autofocus>
                </div>
            </div>

            <div class="mb-2">
                <label for="password" class="form-label-custom">Password</label>
                <div class="input-group-custom">
                    <span class="input-icon"><i class="bi bi-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control-neon" required>
                </div>
            </div>

            <div class="text-start mb-4">
                <a href="{{ route('password.request') }}" class="forgot-link">Esqueceste-te da password?</a>
            </div>

            <button type="submit" class="btn btn-neon-purple w-100 py-3 mb-4">
                <i class="bi bi-box-arrow-in-right me-2"></i> Entrar
            </button>

            <div class="text-center">
                <p class="auth-footer-text">Não tens conta? <a href="{{ route('register') }}" class="register-link">Registra-te</a></p>
            </div>
        </form>
<!-- mensagem de erro do laravel -->
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