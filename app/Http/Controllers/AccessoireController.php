<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;

class AccessoireController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessoires = Accessoire::latest()->paginate(7);
        return view('accessoires.index', compact('accessoires'))->with('i', (\request()->input('page',1)-1)*7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseurs.create');
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
            'acc_nom'=>'required',
            'acc_marque'=>'required',
            'acc_quantite'=>'required',
        ]);
        Accessoire::create($request->all());
        return redirect()->route('accessoires.index')->with('success', 'Accessoire ajoute avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function show(Accessoire $accessoire)
    {
        return view('accessoires.show', compact('accessoire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessoire $accessoire)
    {
        return view('accessoires.edit', compact('accessoire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessoire $accessoire)
    {
        $request->validate([
            'acc_nom'=>'required',
            'acc_marque'=>'required',
            'acc_quantite'=>'required',
        ]);
        $accessoire->update($request->all());
        return redirect()->route('accessoires.index')->with('success', 'Accessoire met a jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessoire  $accessoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessoire $accessoire)
    {
        $accessoire->delete();
        return redirect()->route('accessoires.index')->with('success', 'Accessoire supprimer avec succes');
    }
}
