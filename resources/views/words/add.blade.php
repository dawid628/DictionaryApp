@extends('words.layout')
@section('title', 'Słownik - dodawanie')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <a href="{{ route('index') }}" class="btn btn-primary mb-1">Wróć</a>
    <form method="POST" class="text-white is-invalid" action="{{ route('store-word') }}">
        @csrf
        <div class="form-group">
            <label for="word">Słowo</label>
            <input id="word" name="word" type="text" class="form-control" placeholder="Tutaj wpisz słowo" maxlength="32">
            <div class="invalid-feedback">zle</div>
        </div>
        <div class="form-group mt-2">
            <label for="definition">Definicja</label>
            <textarea id="definition" name="definition" class="form-control" rows="3" placeholder="Tutaj wpisz definicję" required maxlength="100"></textarea>
        </div>
        <div class="form-group mt-2 ">
            <label for="tag">Tagi</label>
            <input id="tag" class="form-control" placeholder="Podaj taga i naciśnij enter" maxlength="13">
            <p id="tags-error" class="text-danger d-none"></p>
            <div id="tags-container"></div>   
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">Zapisz</button>
        </div>
        <input type="hidden" id="tags" name="tags">
    </form>
</div>
@endsection