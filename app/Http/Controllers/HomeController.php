<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::all();
        $voitures = Voiture::all();
        $dispo = Voiture::where('statut','Disponible')->get();
        $nondispo = Voiture::where('statut','<>','Disponible')->get();
        return view('home', compact('clients','voitures','dispo','nondispo'));
    }
}
