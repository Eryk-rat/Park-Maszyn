@extends('layouts.app')



@section('content')
<div class="container-0">
    <div class="emploer list">
    @foreach ($users as $user)
    @include('item.employee')
    @endforeach
    </div>

</div>

<div class="container-1">

    <div class="container-form-employee">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            @if (auth()->user()->position->permissions == 1)
            <div class="form-employee">
                <label for="companies">Firma:</label>
                <select class="form-control"  name="company_id" id="company_id">
                    <option value="">Wybierz firmę</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-employee">
                <label for="name">Imię:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-employee">
                <label for="last_name">Nazwisko:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required>
            </div>
            <div class="form-employee">
                <label for="email">Meil:</label>
                <input type="email" class="form-control" name="email" id="email" required>
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