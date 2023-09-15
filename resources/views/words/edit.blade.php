@extends('words.layout')
@section('title', 'Słownik - edycja')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <form method="POST" class="text-white is-invalid" action="{{ route('update-word') }}">
        @csrf
        <input hidden name="id" value="{{ $word->id }}"/>
        <div class="form-group">
            <label for="word">Słowo</label>
            <input id="word" name="word" type="text" class="form-control" placeholder="Tutaj wpisz słowo" maxlength="32" value="{{ $word->name }}">
            <div class="invalid-feedback">zle</div>
        </div>
        <div class="form-group mt-2">
            <label for="definition">Definicja</label>
            <textarea id="definition" name="definition" class="form-control" rows="3" placeholder="Tutaj wpisz definicję" required maxlength="100">{{ $word->definition }}</textarea>

        </div>
        <div class="form-group mt-2 ">
            <label for="tag">Tagi</label>
            <input id="tag" class="form-control" placeholder="" maxlength="13" disabled>
            <p id="tags-error" class="text-danger d-none"></p>
            <div id="tags-container">
                @if($word->tags != null)
                    @foreach ($word->tags as $tag)
                        <div class="tag-container">
                            <span class="badge badge-primary tag-text">{{ $tag }}</span>
                            <button type="button" class="btn btn-danger btn-sm tag-delete-btn" data-tag="{{ $tag }}">X</button>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
        
        <div class="form-group">
            <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Wróć</a>
            <button type="submit" class="btn btn-primary mt-3">Zapisz</button>
        </div>
        <input type="hidden" id="tags" name="tags" value="{{ !is_null($word->tags) ? implode(', ', $word->tags) : "" }}">
    </form>
</div>
@endsection