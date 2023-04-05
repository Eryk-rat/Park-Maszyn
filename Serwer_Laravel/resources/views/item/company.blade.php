    <div class="single-company">
        <div class='company-data'>
            <label class="company-label">Firma:</label>
            <div class="company-header">
                {{ $company->name }}
            </div>
            <label class="company-label">Address:</label>
            <div class="company-body">
                <p>{{ $company->address }}</p>
            </div>
        </div>
        <div class='company-logo'>
        <img src="{{ url('/ikons/brak_foto.png') }}" alt="logo" width="125" height="100">
        </div>
        <button type="submit" class="btn-form-employee">Edytuj</button>
        <button type="submit" class="btn-form-employee">Usuń</button>
    </div>
