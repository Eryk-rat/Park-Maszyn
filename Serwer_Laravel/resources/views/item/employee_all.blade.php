<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->company->name }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->last_name }}</td>
    <td>{{ $user->position->name }}</td>

    <td>
        <div class="button-container-table">
            <button type="submit" class="btn-form-table">Edytuj</button>
            <button type="submit" class="btn-form-table">Usuń</button>
        </div>
    </td>
</tr>
