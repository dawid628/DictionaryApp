@extends('words.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card myform">
                <div class="card-header">Panel użytkownika</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Zostałeś zalogowany
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
