@extends('layouts.app')



@section('content')

<div class='container-0'>  
    Stworzone firmy
</div>

<form method="POST" action="{{ route('companies.store') }}">
    @csrf
    <div class="container-1">
        <div class="container-form-employee">
           
            <div class ="form-employee">
                <label for="company_name">Nazwa Firmy:</label>
                <input  type="text" class="form-control"name="name" id="name" required>
            </div>

            <div class ="form-employee">
                <label for="company_adress">Adress:</label>
                <input type="adress" class="form-control" name="address" id="address" required>
            </div>

            <button type="submit" class="btn-form-employee">Dodaj Firmę</button>

        </div>
    </div>
</form>
@endsection