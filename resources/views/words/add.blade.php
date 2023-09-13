@extends('words.layout')
@section('title', 'Słownik - dodawanie')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <form method="POST" class="text-white is-invalid">
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
            <input id="tag" name="tag" class="form-control" placeholder="Podaj taga i naciśnij enter" maxlength="10">
            <div id="tags-container"></div>   
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">Zapisz</button>
        </div>
        <input type="hidden" id="tags" name="tags">
    </form>
</div>
@endsection