<?php

namespace App\Http\Controllers;

use App\Offre;
use App\Cahier;
use Illuminate\Http\Request;
use App\Http\Requests\OffreRequest;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Offre $model)
    {
        return view('offres.index', ['offres' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cahier $cahier)
    {
        return view('offres.create' , ['cahiers' => $cahier->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffreRequest $request, Offre $model)
    {
        $model->create([
            'annee' => $request->get('annee'),
            'title' => $request->get('title'),
            'numero_cahier' => $request->get('numero_cahier'),
            'etat' => 0
            
        ]);

        return redirect()->route('offre.index')->withStatus(__('Offre successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        $offre->update([
            
            'etat' => !($offre->etat)
            
        ]);

        return redirect()->route('offre.index')->withStatus(__('Offre successfully enabled.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offre.index')->withStatus(__('Offre successfully deleted.'));
    }
}
