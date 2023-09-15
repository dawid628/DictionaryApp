@extends('words.layout')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div style="margin-top: 33vh; justify-content-center">
        @if(session('success'))
            <div class="alert alert-success p-3 m-2" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="align-items-center mb-3">
            <a href="{{ route('create') }}" class="btn btn-primary m-1">Dodaj słowo</a>
            <input type="text" id="filterInput" class="form-control" placeholder="Wyszukaj słowo lub tag">
        </div>
        <table class="table text-center" id="wordsTable">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Tagi</th>
                    <th>Data utworzenia</th>
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
