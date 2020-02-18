<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Requests\FournisseurRequest;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Fournisseur $model)
    {
        return view('fournisseurs.index', ['fournisseurs' => $model->paginate(15)]);
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
    public function store(FournisseurRequest $request, Fournisseur $model)
    {
        $model->create([
            'name' => $request->get('name'),
            'numero' => $request->get('numero'),
            'email' => $request->get('email'),
            'adresse' => $request->get('adresse'),
            'code_postal' => $request->get('code_postal'),
            
        ]);

        return redirect()->route('fournisseur.index')->withStatus(__('Fournisseur successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
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
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(FournisseurRequest $request, Fournisseur $fournisseur)
    {
        $fournisseur->update([
            'name' => $request->get('name'),
            'numero' => $request->get('numero'),
            'email' => $request->get('email'),
            'adresse' => $request->get('adresse'),
            'code_postal' => $request->get('code_postal'),
        ]);

        return redirect()->route('fournisseur.index')->withStatus(__('Fournisseur successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();

        return redirect()->route('fournisseur.index')->withStatus(__('fournisseur successfully deleted.'));
    }
}
