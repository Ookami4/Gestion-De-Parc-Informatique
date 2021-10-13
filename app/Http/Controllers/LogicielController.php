<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Logiciel;
use Illuminate\Http\Request;
use App\Models\Fournisseur;

class LogicielController extends Controller
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
        $logiciels = Logiciel::where([
            ['log_serie', "!=", NULL],
            [function($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('log_serie', 'LIKE', '%', $term, '%')->get();
                }
            }]
        ])->orderBy("id", "desc")->paginate(5);
        //$materiels = Materiel::latest()->paginate(5);
        return view('logiciels.index', compact('logiciels'))->with('i', (\request()->input('page', 1)-1)*5);
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
        return view('logiciels.create', compact('fournisseurs', 'factures'));
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
            'log_nom'=>'required',
            'log_serie'=>'required',
            'log_marque'=>'required',
            'log_license'=>'required',
            'log_prixachat'=>'required',
            'log_dateachat'=>'required',
            'log_garantie'=>'required',
            'for_id'=>'required',
            'fac_id'=>'required',
        ]);
        Logiciel::create($request->all());
        return redirect()->route('logiciels.index',)->with('success', 'Logiciel ajoute avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logiciel  $logiciel
     * @return \Illuminate\Http\Response
     */
    public function show(Logiciel $logiciel)
    {
        $fournisseur = Fournisseur::findORFail($logiciel->for_id);
        $facture = Facture::findOrFail($logiciel->fac_id);
        return view('logiciels.show',compact('logiciel', 'fournisseur','facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logiciel  $logiciel
     * @return \Illuminate\Http\Response
     */
    public function edit(Logiciel $logiciel)
    {
        $fournisseurs = Fournisseur::all();
        $factures = Facture::all();
        return view('logiciels.edit',compact('logiciel', 'fournisseurs','factures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logiciel  $logiciel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logiciel $logiciel)
    {
        $request->validate([
            'log_nom'=>'required',
            'log_serie'=>'required',
            'log_marque'=>'required',
            'log_prixachat'=>'required',
            'log_dateachat'=>'required',
            'log_garantie'=>'required',
            'for_id'=>'required',
            'fac_id'=>'required',
        ]);
        $logiciel->update($request->all());
        return redirect()->route('logiciels.index')->with('success', 'Logiciel met a jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logiciel  $logiciel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logiciel $logiciel)
    {
        $logiciel->delete();
        return redirect()->route('logiciels.index')->with('success', 'Logiciel supprime avec succes');
    }
}
