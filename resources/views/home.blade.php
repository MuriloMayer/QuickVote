@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href=" {{ mix('/css/home.css') }}">
@endpush
@section('nav')
    @parent
@endsection
@section('content')
    <div class="polls-container">
{{--        @foreach($polls as $poll)--}}
            <div class="poll-card">
                <div class="poll-header">
                    <h2>Titulo da votação</h2>
                    <span class="status-dot"></span>
                </div>
                <div class="poll-body">
                    <p class="start">De 10/01/2024</p>
                    <p class="end">A 12/01/2024</p>
                    <p class="votes">10 Votos</p>
                </div>
            </div>
        <div class="poll-card">
            <div class="poll-header">
                <h2>Titulo da votação</h2>
                <span class="status-dot"></span>
            </div>
            <div class="poll-body">
                <p class="start">De 10/01/2024</p>
                <p class="end">A 12/01/2024</p>
                <p class="votes">10 Votos</p>
            </div>
        </div>
        <div class="poll-card">
            <div class="poll-header">
                <h2>Titulo da votação</h2>
                <span class="status-dot"></span>
            </div>
            <div class="poll-body">
                <p class="start">De 10/01/2024</p>
                <p class="end">A 12/01/2024</p>
                <p class="votes">10 Votos</p>
            </div>
        </div>
        <div class="poll-card">
            <div class="poll-header">
                <h2>Titulo da votação</h2>
                <span class="status-dot"></span>
            </div>
            <div class="poll-body">
                <p class="start">De 10/01/2024</p>
                <p class="end">A 12/01/2024</p>
                <p class="votes">10 Votos</p>
            </div>
        </div>


    </div>


@endsection
