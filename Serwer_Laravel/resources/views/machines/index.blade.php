@extends('layouts.app')


@section('content')

<div class='container-content'>
    <div class='container-header'>
        <div class='header-name'>
            Obecne Maszyny
        </div>   
        
        <a href="{{ route('machines.create') }}">
        <div >
            <button type="submit" class='header-botton'>Dodaj Maszynę</button>
        </div>
        </a>
    </div> 

    <table class='Table_date'>
        <thead>
            <tr>
                <th></th>
                <th>Numer seryjny</th>
                <th>Data zakupu</th>
                <th>Nazwa</th>
                <th>Położenie</th>
                @if (auth()->user()->position->permissions == 1)
                    <th>Id firmy</th>
                @endif
                <th>Zdjęcie</th>
                <th>Akcje</th>
            </tr>
        </thead>
        @foreach ($machines as $machine)
        @include('item.machine')
        @endforeach
    </table>
</div>

@endsection