<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *@param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->is_admin){
            $id = Auth::id();
            $maintenances = Maintenance::where('util_id', $id)->get();
            return view('maintenances.index', compact('maintenances'));
        }
    }
    public function indexadmin(){
        $maintenances = Maintenance::oldest()->paginate(7);
        foreach ($maintenances as $maintenance){
            $user = User::where('id', $maintenance->util_id)->get();
            $users[] = $user;
        }
        return view('maintenances.indexadmin',compact('maintenances','users'))->with('i',(\request()->input('page',1)-1)*6);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenances.create');
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
            'maint_description',
            'maint_type',
            'util_id',
        ]);
        Maintenance::create($request->all());
        return redirect()->route('maintenances.index')->with('success', 'Votre demande est bien effectue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        $user = User::findOrFail($maintenance->util_id);
        return view('maintenances.show',compact('maintenance','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $user = User::findOrFail($maintenance->util_id);
        return view('maintenances.edit',compact('maintenance','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        if (Auth::user()->is_admin){
            $maintenance= Maintenance::findOrFail($maintenance->id);
            $maintenance->status = true;
            $maintenance->save();
            return redirect()->route('maintenances.indexadmin')->with('success', 'Demande bien traite');
        }
        if (!Auth::user()->is_admin){
            $request->validate([
                'maint_type'=>'required',
                'maint_description'=>'required',
            ]);
            $maintenance->update($request->all());
            return redirect()->route('maintenances.index')->with('success', 'Votre Demande De Maintenance est modifie avec succes');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        if (Auth::user()->is_admin){
            return redirect()->route('maintenances.indexadmin')->with('sucsess', 'Demande est supprime avec succes');
        }
        if (!Auth::user()->is_admin){
            return redirect()->route('maintenances.index')->with('sucsess', 'Demande est supprime avec succes');
        }
    }
}
