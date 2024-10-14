@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href=" {{ mix('/css/pollNew.css') }}">
@endpush

@section('nav')
    @parent
@endsection
@section('content')

    <div class="poll-container">
        <form action="{{ route('poll.store') }}" method="POST">
            @csrf
            @if( isset($poll))
                <input type="hidden" name="user_id" value="{{ $poll->user_id }}">
                <input type="hidden" name="poll_id" value="{{ $poll->id }}">
            @endif
            <div class="form-top">
                <div class="title">
                    <input type="text" name="title" placeholder="Título"
                           value="{{ isset($poll) ? $poll->title : '' }}"/>
                    @error('title')
                    <span class="error">
                    {{ $message }}
                </span>
                    @enderror
                </div>

                <div class="dates">
                    <div class="date">
                        <div>
                            <label for="start_date">de</label>
                            <input type="date" id="start_date" name="start_date" placeholder="Data Início"
                                   maxlength="10" value="{{ isset($poll) ? $poll->start_date : '' }}"/>
                        </div>
                        @error('start_date')
                        <span class="error">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="date">
                        <div>
                            <label for="end_date">a</label>
                            <input type="date" id="end_date" name="end_date" placeholder="Data Fim" maxlength="10"
                                   value="{{ isset($poll) ? $poll->end_date : '' }}"/>
                        </div>
                        @error('end_date')
                        <span class="error">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            @if(isset($poll) && isset($options))
                <div id="options-container" class="options-container">
                    @foreach($options as $option)
                        <div class="input-field">
                            <input type="text" name="options[{{ $loop->index }}][title]" value="{{ $option->title }}"
                                   placeholder="Opção"/>
                            <input type="hidden" name="options[{{ $loop->index }}][id]" value="{{ $option->id }}"/>
                        </div>
                    @endforeach
                </div>
            @else
                <div id="options-container" class="options-container">
                    <div class="input-field"><input type="text" name="options[]" placeholder="Opção 01" required/></div>
                    <div class="input-field"><input type="text" name="options[]" placeholder="Opção 02" required/></div>
                    <div class="input-field"><input type="text" name="options[]" placeholder="Opção 03" required/></div>
                </div>
            @endif

            <button type="button" class="add-option" id="add-option">+</button>

            <button type="submit" class="submit-btn">Salvar</button>

            @error('options.*')
            <span class="option-error">
                    {{ $message }}
                </span>
            @enderror
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('/js/pollNew.js') }}"></script>
@endpush
