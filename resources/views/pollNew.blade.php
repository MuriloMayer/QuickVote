@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href=" {{ mix('/css/pollNew.css') }}">
@endpush

@section('nav')
    <nav>
        <div class="Title">
            <h1>QuickVote</h1>
        </div>
        <div class="button">
            <a href="#" >Home</a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="poll-container">
        <form action="{{ route('poll.store') }}" method="POST">
            @csrf
            <div class="form-top">
                <div class="title">
                    <input type="text" name="title" placeholder="Título" required />
                </div>

                <div class="dates">
                        <input type="text" id="start_date" name="start_date" placeholder="Data Início" maxlength="10" required />
                        <input type="text" id="end_date" name="end_date" placeholder="Data Fim" maxlength="10" required />
                </div>
            </div>

            <div id="options-container" class="options-container">
                <div class="input-field"><input type="text" name="options[]" placeholder="Opção 01" required /></div>
                <div class="input-field"><input type="text" name="options[]" placeholder="Opção 02" required /></div>
                <div class="input-field"><input type="text" name="options[]" placeholder="Opção 03" required /></div>
            </div>

            <button type="button" class="add-option" id="add-option" class="add-option-btn">+</button>

            <button type="submit" class="submit-btn">Salvar</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function updateRemoveButtons() {
            const removeButtons = document.querySelectorAll('.remove-option-btn');
            removeButtons.forEach((btn) => {
                btn.style.display = 'inline-block';
                btn.addEventListener('click', function () {
                    btn.parentElement.remove();
                    updatePlaceholders();
                });
            });
        }

        function updatePlaceholders() {
            const options = document.querySelectorAll('#options-container input[type="text"]');
            options.forEach((option, index) => {
                option.placeholder = `Opção ${index + 1}`;
            });
        }

        document.getElementById('add-option').addEventListener('click', function () {
            const optionsContainer = document.getElementById('options-container');
            const optionCount = optionsContainer.children.length + 1;

            const newOption = document.createElement('div');
            newOption.classList.add('input-field');
            newOption.innerHTML = `
      <input type="text" name="options[]" placeholder="Opção ${optionCount}" required />
      <button type="button" class="remove-option-btn">-</button>
    `;
            optionsContainer.appendChild(newOption);

            updateRemoveButtons();
        });

        updateRemoveButtons();
    </script>

@endpush
