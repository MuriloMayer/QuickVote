@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href=" {{ mix('/css/home.css') }}">
    <link rel="stylesheet" href=" {{ mix('/css/pagination.css') }}">
@endpush
@section('nav')
    <nav>
        <div class="Title">
            <h1>QuickVote</h1>
        </div>
        @error('error')
        <div>
            <p>{{ $message }}</p>
        </div>
        @enderror
        @if(session('success'))
            <div>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="button">
            <a href="{{ route('poll.new') }}">Crie a sua clicando aqui</a>
            @if(!Auth::check())
                <a href="{{ route('user.login') }}">Entrar</a>
            @else
                <a href="{{ route('user.logout') }}">Sair</a>
            @endif
        </div>
    </nav>
@endsection
@section('content')
    <div class="polls-container">
        @foreach($polls as $poll)
            <a href="{{ route('poll.view', $poll) }}">
                <div class="poll-card">
                    <div class="poll-header">
                        <h2>{{$poll->title}}</h2>
                        @if($poll->start_date > now())
                            <span class="status-dot-red"></span>
                        @elseif($poll->end_date < now())
                            <span class="status-dot-red"></span>
                        @else
                            <span class="status-dot-green"></span>
                        @endif
                    </div>
                    <div class="poll-body">
                        <p class="start">De {{ date('d/m/y', strtotime($poll->start_date)) }}</p>
                        <p class="end">A {{ date('d/m/y', strtotime($poll->end_date)) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    {{ $polls->onEachSide(0)->links() }}

@endsection
@push('scripts')
    <script>
        window.addEventListener('error', function (event) {
            window.alert('Erro: ' + event.message);
        });
    </script>
@endpush
