
<tr>
    <td>{{ $machine->id }}</td>
    <td>{{ $machine->serial_number }}</td>
    <td>{{ $machine->purchase_date }}</td>
    <td>{{ $machine->name }}</td>
    <td>{{ $machine->location }}</td>

    @if (auth()->user()->position->permissions == 1)
        <td>{{ $machine->company->name }}</td>
    @endif

    <td><img src="{{ url('/ikons/brak_foto.png') }}" alt="zdjęcie" width="50" height="50"></td>
    
    <td>
        <div class="button-container-table">
            <button type="submit" class="btn-form-table">Edytuj</button>
            <button type="submit" class="btn-form-table">Usuń</button>
        </div>
    </td>
</tr>

