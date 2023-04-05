@extends('layouts.app')

@include('item.sidebar')

@section('content')

<div class='container-firmy'>
    <div class='container-firmy-header'>
        <div class='firmy-header-name'>
            Stworzone firmy
        </div>   
        
        <div >
            <button type="submit" class='firmy-header-botton'>Dodaj Firmę</button>
        </div>
    </div>  
    

    @foreach ($companies as $company)
    @include('item.company')
    @endforeach
</div>

@endsection