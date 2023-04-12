<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        Company::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('companies.index')->with('success', 'Firma dodana!');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $company->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('companies.index')->with('success', 'Firma zaktualizowana!');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Firma usunięta!');
    }
}
