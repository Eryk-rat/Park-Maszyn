<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->position->permissions == 1)
        {
            $users = User::all();
        }else{
            $users = User::with('position')->where('company_id', $user->company->id)->get();
        }
        return view('employees.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

    $user = Auth::user();


        if ($user->company) {
            $users = User::with('position')->where('company_id', $user->company->id)->get();
            $loggedUser = auth()->user();
            $positions = Position::where('id', '>=', $loggedUser->position_id)->get();


            if ($loggedUser->position_id === 1) {
                $companies = Company::all();
                return view('employees.create', compact('positions', 'users', 'companies'));
            }
            return view('employees.create', compact('positions', 'users'));
        } else {
            return view('employees.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('user 1', $request->all());
        $user = Auth::user();

        if (!$request->input('company_id')) {
            $request['company_id'] = $user->company_id;
        }

        Log::info('user 2', $request->all());

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'position_id' => 'required|exists:positions,id',
            'company_id' => 'required|exists:companies,id',
        ]);

        Log::info('user 3', $request->all());


        $New_Users = new User;
        $New_Users->name = $request->input('name');
        $New_Users->last_name = $request->input('last_name');
        $New_Users->password = bcrypt($request->input('password'));
        $New_Users->email = $request->input('email');
        $New_Users->position_id = $request->input('position_id');
        $New_Users->company_id = $request->input('company_id');
        $New_Users->save();
        return redirect()->route('employees.index')
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
