<?php

namespace App\Http\Controllers;
use App\Cahier;
use App\Fournisseur;
use App\Offre;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Cahier $cahier, Fournisseur $fournisseur, Offre $offre)
    {
        return view('dashboard',[
            'cahiers' => $cahier->count(),
            'fournisseurs' => $fournisseur->count(),
            'offres' => $offre->count(),

            ]);
    }
}
