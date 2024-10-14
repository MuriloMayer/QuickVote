@extends('layouts.app')
@push('styles')
    <link href="{{ mix('css/user.css') }}" rel="stylesheet">
@endpush
@section('nav')
    <nav>
        <div class="Title">
            <h1>QuickVote</h1>
        </div>
        <div class="button">
            <a href="{{ route('user.login') }}">Login</a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="title">
        <h1>Crie sua conta</h1>
    </div>
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="register-container">
            <div class="register-inputs">
                <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}"/>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"/>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
                    <input type="password" name="password" placeholder="Senha">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
                    <input type="password" name="password_confirmation" placeholder="Confirme Sua Senha">
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-button">
                <button type="submit" class="submit-btn">Salvar</button>
            </div>
        </div>
    </form>
@endsection
