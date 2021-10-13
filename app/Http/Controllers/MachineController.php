<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $machines = Machine::where([
            ['lieu_affect', "!=", NULL],
            [function($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('lieu_affect', 'LIKE', '%', $term, '%')->get();
                }
            }]
        ])->orderBy("id", "desc")->paginate(6);
        return view('machines.index', compact('machines'))->with('i', (\request()->input('page',1)-1)*6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('machines.create' ,compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mach_nom' => 'required',
            'mach_marque' => 'required',
            'mach_RAM' => 'required',
            'mach_ROM' => 'required',
            'mach_CPU' => 'required',
            'mach_carte_reseau' => 'required',
            'affectter' => 'required',
            'date_affect' => 'required',
            'lieu_affect' => 'required',
            'util_id' => 'required',
        ]);
        Machine::create($request->all());
        return redirect()->route('machines.index')->with('success','Machine ajouter avec succes');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        $user = User::findOrFail($machine->util_id);
        return view('machines.show',compact('machine','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        $users = User::all();
        return view('machines.edit', compact('machine','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machine $machine)
    {
        $request->validate([
            'mach_nom' => 'required',
            'mach_marque' => 'required',
            'mach_RAM' => 'required',
            'mach_ROM' => 'required',
            'mach_CPU' => 'required',
            'mach_carte_resaeu' => 'required',
            'affectter' => 'required',
            'date_affect' => 'required',
            'lieu_affect' => 'required',
            'util_id' => 'required',
        ]);
        $machine->update($request->all());
        return redirect()->route('machines.index')->with('success', 'Machine mis a jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();
        return redirect()->route('machines.index')->with('success', 'Machine supprime avec succes');
    }
}
