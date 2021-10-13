<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Materiel;
use App\Models\Logiciel;

class FactureController extends Controller
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
        $factures = Facture::latest()->paginate(6);
        foreach($factures as $facture){
            $fournisseur=Fournisseur::where('id',$facture->for_id)->get();
            $fournisseurs[] = $fournisseur;
        }
        return view('factures.index', compact('factures','fournisseurs'))->with('i',(\request()->input('page',1)-1)*6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Fournisseur::all();
        return view('factures.create',compact('fournisseurs'));
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
            'fact_date' => 'required',
            'prixtotal' => 'required',
            'for_id' => 'required',
        ]);
        Facture::create($request->all());
        return redirect()->route('factures.index')->with('success', 'Facture ajouter avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        $materiels = Materiel::where('fac_id', $facture->id)->get();
        $logiciels = Logiciel::where('fac_id', $facture->id)->get();
        $fournisseur = Fournisseur::findOrFail($facture->for_id);
        return view('factures.show', compact('facture', 'materiels','logiciels','fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
