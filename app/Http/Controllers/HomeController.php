<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Charts\Vente;
use App\Models\Client;
use App\Models\Voiture;
use App\Models\Operation;
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
        $dispo = Voiture::where('statut', 'Disponible')->get();
        $nondispo = Voiture::where('statut', '<>', 'Disponible')->get();
        $label = collect([]);
        $data = array();
        $final = collect([]);

        foreach ($dispo as $v) {
            $tmp=[];
            if(!$label->contains( strtolower($v->marque))){
                $label->push(strtolower($v->marque));
                $data[strtolower($v->marque)]=1;
            } else {
                $data[strtolower($v->marque)]= intval($data[strtolower($v->marque)])+1;
            }
        }

        foreach ($data as $k) {
            $final->push($k);
        }
        $chart = new Vente;
        $chart->labels($label);
        $chart->dataset('Marques', 'pie', $final);

        $data2 = collect([]); // Could also be an array

        for ($days_backwards = 2; $days_backwards >= 0; $days_backwards--) {
            // Could also be an array_push if using an array rather than a collection.
            $data2->push(Operation::whereMonth('created_at', Carbon::now()->subMonths($days_backwards)->month)->count());
        }

        $chart2 = new Vente;
        $chart2->labels(['Il y\'a 2 mois', 'Le mois passé', 'Ce mois']);
        $chart2->dataset('Ventes des 03 derniers mois', 'line', $data2);
        return view('home', compact('clients', 'voitures', 'dispo', 'nondispo', 'chart', 'chart2'));
    }
}
