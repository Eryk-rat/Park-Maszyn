@extends('layouts.app')

@include('item.sidebar')

@section('content')
<div class="container-0">
    <div class="emploer list">
        Twoi pracownicy
    </div>

</div>

<div class="container-1">

    <div class="container-form-employee">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <div class="form-employee">
                <label for="first_name">Imię:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" required>
            </div>
            <div class="form-employee">
                <label for="last_name">Nazwisko:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required>
            </div>
            <div class="form-employee">
                <label for="password">Hasło:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-employee">
                <label for="position_id">Stanowisko:</label>
                <select class="form-control" name="position_id" id="position_id" required>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-form-employee">Dodaj pracownika</button>
        </form>
    </div>
</div>
@endsection