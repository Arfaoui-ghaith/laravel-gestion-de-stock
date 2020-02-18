<?php

namespace App\Http\Controllers;

use App\Cahier;
use App\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Requests\CahierRequest;

class CahierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cahier $cahier)
    {
        return view('cahiers.index', ['cahiers' => $cahier->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Fournisseur $fournisseur)
    {
        return view('cahiers.create' , ['fournisseurs' => $fournisseur->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CahierRequest $request, Cahier $model)
    {
        $model->create([
            'annee' => $request->get('annee'),
            'Chef_projet' => $request->get('Chef_projet'),
            'fournisseur' => $request->get('fournisseur'),
            'date_lancement' => $request->get('date_lancement'),
            'observation' => $request->get('observation'),
            
        ]);

        return redirect()->route('cahier.index')->withStatus(__('Cahier successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cahier  $cahier
     * @return \Illuminate\Http\Response
     */
    public function show(Cahier $cahier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cahier  $cahier
     * @return \Illuminate\Http\Response
     */
    public function edit(Cahier $cahier,Fournisseur $fournisseur)
    {
        return view('cahiers.edit', ['fournisseurs' => $fournisseur->all(), 'cahier' => $cahier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cahier  $cahier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cahier $cahier)
    {
        $cahier->update([
            'annee' => $request->get('annee'),
            'Chef_projet' => $request->get('Chef_projet'),
            'fournisseur' => $request->get('fournisseur'),
            'date_lancement' => $request->get('date_lancement'),
            'observation' => $request->get('observation'),
        ]);

        return redirect()->route('cahier.index')->withStatus(__('Cahier successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cahier  $cahier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cahier $cahier)
    {
        $cahier->delete();

        return redirect()->route('cahier.index')->withStatus(__('Cahier successfully deleted.'));
    }
}
