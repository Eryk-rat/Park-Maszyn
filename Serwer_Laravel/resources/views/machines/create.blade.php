@extends('layouts.app')



@section('content')

<div class='container-0'>  
    dodanie maszyny
</div>
<form method="POST" action="{{ route('machines.store') }}">
    @csrf
    <div class="container-1">
        <div class="container-form-employee">
            @if (auth()->user()->position->permissions == 1)
                <div class="form-employee">
                    <label for="companies">Firma:</label>
                    <select class="form-control" id="company_id" name="company_id">
                        <option value="">Wybierz firmę</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class ="form-employee">
                <label for="serial_number">Numer seryjny:</label>
                <input  type="text" class="form-control"name="serial_number" id="serial_number" required>
            </div>

            <div class ="form-employee">
                <label for="purchase_date">Data zakupu:</label>
                <input type="date" class="form-control" name="purchase_date" id="purchase_date" required>
            </div>

            <div class ="form-employee">
                <label for="name">Nazwa:</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>

            <div class ="form-employee">
                <label for="location">Umiejscowienie Maszyny:</label>
                <input  class="form-control" type="text" name="location" id="location" required>
            </div>
            <button type="submit" class="btn-form-employee">Dodaj Maszynę</button>
        </div>
    </div>
</form>
@endsection