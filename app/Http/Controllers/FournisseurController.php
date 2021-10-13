<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Logiciel;
use App\Models\Materiel;
use Illuminate\Http\Request;

class FournisseurController extends Controller
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
       $fournisseurs = Fournisseur::where([
            ['for_nom', "!=", NULL],
            [function($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('for_nom', 'LIKE', '%', $term, '%')->get();
                }
            }]
        ])->orderBy("id", "desc")->paginate(6);
        //$fournisseurs = Fournisseur::latest()->paginate(4);
        return view('fournisseurs.index', compact('fournisseurs'))->with('i', (\request()->input('page',1)-1)*6);
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
            'for_nom'=>'required',
            'for_email' => ['required', 'string', 'email', 'max:255', 'unique:fournisseurs'],
            'for_telephone'=>'required',
            'for_fax'=>'required',
            'for_ville'=>'required',
            'for_zip'=>'required',
            'for_adress'=>'required',
            'rib' => 'required',
        ]);
        Fournisseur::create($request->all());
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouter avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        $materiels = Materiel::where('for_id',$fournisseur->id)->get();
        $logiciels = Logiciel::where('for_id',$fournisseur->id)->get();
        return view('fournisseurs.show', compact('fournisseur', 'materiels','logiciels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'for_nom'=>'required',
            'for_email'=>'required',
            'for_telephone'=>'required',
            'for_fax'=>'required',
            'for_ville'=>'required',
            'for_zip'=>'required',
            'for_adress'=>'required',
            'rib' => 'required',
        ]);
        $fournisseur->update($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis a jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprime avec succes');
    }
}
