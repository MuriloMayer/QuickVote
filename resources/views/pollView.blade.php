@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href=" {{ mix('/css/pollView.css') }}">
@endpush

@section('nav')
    <nav>
        <div class="Title">
            <h1>QuickVote</h1>
        </div>
        <div class="button">
            <a href="#">Home</a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="poll-container" data-poll-id="{{ $poll->id  }}">
        <form action="{{ route('poll.store') }}" method="GET">
            @csrf
            <div class="form-top">
                <div class="title">
                    <input type="text" name="title" value="{{ $poll->title }}" readonly/>
                </div>

                <div class="dates">
                    <div class="date">
                        <label for="start_date">de</label>
                        <input type="date" id="start_date" name="start_date" value="{{ $poll->start_date }}" readonly/>
                    </div>
                    <div class="date">
                        <label for="end_date">a</label>
                        <input type="date" id="end_date" name="end_date" value="{{ $poll->end_date }}" readonly/>
                    </div>

                </div>
            </div>

            <div id="options-container" class="options-container">
                @foreach($options as $option)
                    <div class="input-field"><input type="button" name="options" value="{{ $option->title }}"
                                                    id="{{ $option->id }}"/>
                        <p class="votes" id="{{ $option->id }}-vote">{{ $option->votes }}</p>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('/js/pollView.js') }}"></script>
@endpush
