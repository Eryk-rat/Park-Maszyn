


<tr>
    <td>{{ $company->id }}</td>
    <td>{{ $company->name }}</td>
    <td>{{  $company->address }}</td>

    <td><img src="{{ url('/ikons/brak_foto.png') }}" alt="zdjęcie" width="50" height="50"></td>
    <td>
        <div class="button-container-table">
            <button type="submit" class="btn-form-table">Edytuj</button>
            <button type="submit" class="btn-form-table">Usuń</button>
        </div>
    </td>
</tr>
