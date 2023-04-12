@extends('layouts.app')



@section('content')

<div class='container-content'>
    <div class='container-header'>
        <div class='header-name'>
            Stworzone firmy
        </div>  

        <a href="{{ route('companies.create') }}">
        <div >
            <button type="submit" class='header-botton'>Dodaj Firmę</button>
        </div>
        </a>
    </div>  
    
    <table class='Table_date'>
        <thead>
            <tr>
                <th></th>
                <th>Nazwa</th>
                <th>Adress</th>
                <th>Zdjęcie</th>
                <th>Akcje</th>
            </tr>
        </thead>
    @foreach ($companies as $company)
    @include('item.company')
    @endforeach
</div>

@endsection