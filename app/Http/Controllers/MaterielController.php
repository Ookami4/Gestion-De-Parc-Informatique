<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Fournisseur;
use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
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
    public function index(Request $request)
    {
        $materiels = Materiel::where([
            ['mat_serie', "!=", NULL],
            [function($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('mat_serie', 'LIKE', '%', $term, '%')->get();
                }
            }]
        ])->orderBy("id", "desc")->paginate(5);
         //$materiels = Materiel::latest()->paginate(5);
         return view('materiels.index', compact('materiels'))->with('i', (\request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $factures = Facture::all();
        return view('materiels.create', compact('fournisseurs', 'factures'));
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
            'mat_serie' => 'required',
            'mat_nom' => 'required',
            'mat_model' => 'required',
            'for_id' => 'required',
            'fac_id' => 'required',
            'mat_prixachat' => 'required',
            'mat_garantie' => 'required',
            'mat_dateachat' => 'required',
        ]);

        Materiel::create($request->all());
        return redirect()->route('materiels.index')->with('success','Materiel ajoute avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function show(Materiel $materiel)
    {
        $fournisseur = Fournisseur::findORFail($materiel->for_id);
        $facture = Facture::findOrFail($materiel->fac_id);
        return view('materiels.show', compact('materiel','fournisseur','facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function edit(Materiel $materiel)
    {
        $fournisseurs = Fournisseur::all();
        $factures = Facture::all();
        return view('materiels.edit', compact('materiel', 'fournisseurs', 'factures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiel $materiel)
    {
        $request->validate([
            'mat_serie' => 'required',
            'mat_nom' => 'required',
            'mat_model' => 'required',
            'for_id' => 'required',
            'fac_id' => 'required',
            'mat_prixachat' => 'required',
            'mat_garantie' => 'required',
            'mat_dateachat' => 'required',
        ]);

        $materiel->update($request->all());

        return redirect()->route('materiels.index')->with('success','Materiel mis a jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materiel $materiel)
    {
        $materiel->delete();
        return redirect()->route('materiels.index')->with('success', 'Materiel supprime avec succes');
    }
}
