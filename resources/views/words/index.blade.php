@extends('words.layout')
@section('title', 'Słownik - wyświetlanie')
@section('content')
<div class="container mx-auto mt-24">
    <div class="">
        @if(session('success'))
            <div class="alert alert-success mb-1" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mb-1" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="flex mb-1">
        <a href="{{ route('create') }}" class="btn btn-primary m-1">Dodaj słowo</a>
    </div>
    <div class="flex items-center mb-1">
        <input type="text" id="filterInput" class="form-control w-full" placeholder="Wyszukaj słowo lub tag">
    </div>
    @if(Auth::check())
        <div class="flex mb-3">
            <input type="checkbox" id="mineInput" data-user="{{ Auth::id() }}"/> <span class="text-white m-1">Moje słowa</span>
        </div>
    @endif
    <div id="tableContainer" class="overflow-auto" style="max-height: 33vh;">
        <table class="table text-center" id="wordsTable">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Definicja</th>
                    <th>Tagi</th>
                    <th>Data utworzenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <!-- Wygenerowane w js -->
            </tbody>
        </table>
    </div>
</div>


<script>
    var wordsData = @json($words);
    fillTable(wordsData);
</script>
@endsection
