@extends('layouts.app')

@include('item.sidebar')

@section('content')

<div class='container-0'>  
    dodanie maszyny
</div>
<form method="POST" action="{{ route('machines.store') }}">
    @csrf

    <div>
        <label for="serial_number">Numer seryjny:</label>
        <input type="text" name="serial_number" id="serial_number" required>
    </div>

    <div>
        <label for="purchase_date">Data zakupu:</label>
        <input type="date" name="purchase_date" id="purchase_date" required>
    </div>

    <div>
        <label for="name">Nazwa:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="location">Położenie:</label>
        <input type="text" name="location" id="location" required>
    </div>
</form>
@endsection