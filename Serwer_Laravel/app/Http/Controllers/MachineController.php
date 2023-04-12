<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->position->permissions == 1)
        {
            $machines = Machine::all();
        }else{
            $machines = Machine::where('company_id', $user->company->id)->get();
        }
        
        return view('machines.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loggedUser = auth()->user();

        if ($loggedUser->position_id === 1) {
            $companies = Company::all();
            return view('machines.create', compact('companies'));
        }
        return view('machines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      Log::info('maszyna');
        $user = Auth::user();

        if (!$request->input('company_id')) {
            $request['company_id'] = $user->company_id;
        }
    
        $request->validate([
            'serial_number' => 'required',
            'purchase_date' => 'required|date',
            'name' => 'required',
            'location' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);



        $machine = new Machine;
        $machine->serial_number = $request->input('serial_number');
        $machine->purchase_date = $request->input('purchase_date');
        $machine->name = $request->input('name');
        $machine->location = $request->input('location');
        $machine->company_id = $request->input('company_id');
        $machine->save();
  
        return redirect()->route('machines.index')
        ->with('success', 'Machine created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
