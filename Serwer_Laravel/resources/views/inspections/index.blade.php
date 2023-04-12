

@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('my_css/show_form.css') }}">

<button id="show-form-btn">Pokaż formularz</button>

<div class="form-overlay">
  <div class="form-container">
    <h2>Formularz</h2>
    <form action="{{ route('inspections.store') }}" method="POST">
      @csrf

      <label for="machine_id">Maszyna:</label>
      <select name="machine_id" id="machine_id">
        @foreach ($machines as $machine)
          <option value="{{ $machine->id }}">{{ $machine->name }}</option>
        @endforeach
      </select>

      <br>
      <label for="date">Data przeglądu:</label>
      <input type="date" name="date" id="date">
      <br>

      <label for="employee_id">Wykonujący:</label>
      <select  name="employee_id" id="employee_id">
        @foreach ($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select>

      <br>
      <label for="notes">Uwagi:</label>
      <textarea name="notes" id="notes"></textarea>
      <br>
      <button type="submit">Dodaj przegląd</button>
    </form>
    <button id="hide-form-btn">Anuluj</button>
  </div>
</div>

<div id='calendar'></div>



@endsection