<div class="single-emploeyy">
        <div class='emploeyy-data'>
            <label class="emploeyy-name">Imię: {{ $user->name }}</label>
            </br>
            
            <label class="emploeyy-position">Stanowisko: {{ $user->position->name }}</label>

        </div>

        <button type="submit" class="btn-form-employee">Edytuj</button>
        <button type="submit" class="btn-form-employee">Usuń</button>
    </div>
