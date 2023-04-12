<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Machine;
use App\Models\Position;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class InspectionController extends Controller
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
        if ($user->company) {
            $users = User::with('position')->where('company_id', $user->company->id)->get();
            $loggedUser = auth()->user();
            $positions = Position::where('id', '>=', $loggedUser->position_id)->get();


            if ($loggedUser->position_id === 1) {
                $companies = Company::all();
                return view('inspections.index', compact('machines', 'users', 'companies'));

            }
            return view('inspections.index', compact('machines', 'users'));
        } else {
            return view('inspections.index', compact('machines'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inspections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('przegląd 1', $request->all());
        $request->validate([
            'employee_id' => 'required',
            'machine_id' => 'required',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);
        Log::info('przegląd 2', $request->all());
        $user = Auth::user();

        if (!$request->input('company_id')) {
            $request['company_id'] = $user->company_id;
        }

        $inspection = Inspection::create([
            'user_id' => $request->employee_id,
            'machine_id' => $request->machine_id,
            'company_id' =>  $user->company_id,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);
        Log::info('przegląd 3', $request->all());
        $inspection->save();
    
        return redirect('inspections')->with('success', 'Inspection created successfully.');
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
        $inspection = Inspection::findOrFail($id);
    $machines = Machine::all();
    return view('inspections.edit', compact('inspection', 'machines'));
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

    public function getInspections()
    {
        $user = Auth::user();


        $inspections = Inspection::with('machine')->where('company_id', $user->company->id)->get();
       
        $events = [];

        foreach ($inspections as $inspection) {
        $event = [
            'title' => $inspection->machine->name,
            'start' => $inspection->date,
            'url' => route('inspections.index', $inspection->id),
        ];

        $events[] = $event;
        }

        return response()->json($events);
    }
}
