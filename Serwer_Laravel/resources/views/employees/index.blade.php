@extends('layouts.app')



@section('content')
<div class='container-content'>
    <div class='container-header'>
        <div class='header-name'>
            Pracownicy
        </div>   
        
        <a href="{{ route('employees.create') }}">
        <div >
            <button type="submit" class='header-botton'>Dodaj Pracownika</button>
        </div>
        </a>
    </div> 
    <table class='Table_date'>
        <thead>
            <tr>
                <th></th>
                <th>Firma pracownika</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Stanowisko</th>
                <th>Akcje</th>
            </tr>
        </thead>
        @foreach ($users as $user)
        @include('item.employee_all')
        @endforeach
    </table>
@endsection