@extends('layouts.app')
@push('styles')
    <link href="{{ mix('css/user.css') }}" rel="stylesheet">
@endpush

@if(auth()->check())
    <script>
        window.location.href = "{{ route('home') }}";
    </script>
@endif

@section('nav')
    <nav>
        <div class="Title">
            <h1>QuickVote</h1>
        </div>
    </nav>
@endsection

@section('content')
    <div class="title">
        <h1>Login</h1>
    </div>
    <form method="POST" action="{{ route('user.auth') }}">
        @csrf
        <div class="register-container">
            <div class="register-inputs">
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"/>
                @error('email')
                <span class="error">
                    {{ $message }}
                </span>
                @enderror
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <input type="password" name="password" placeholder="Senha">
                @error('password')
                <span class="error">
                    {{ $message }}
                </span>
                @enderror
                @error('error')
                <span class="error">
                    {{ $message }}
                </span>
                @enderror
                <div class="login-options">
                    <p><a href="#">Esqueci minha senha</a></p>
                    <p>Não tem uma conta? <a href="{{ route('user.register') }}">Clique aqui</a></p>
                </div>

            </div>
            <div class="register-button">
                <button type="submit" class="submit-btn">Login</button>
            </div>
        </div>
    </form>
@endsection
