<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::all();
        $clients = Client::all();
        return view('voiture', compact('voitures', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('image')) {

            $file = uniqid() . "." . $request->image->getClientOriginalName();

            $request->image->storeAs('voitures', $file, 'public');


            $tb = Voiture::create(

                [
                    'marque' => $request->marque,
                    'model' => $request->model,
                    'couleur' => $request->couleur,
                    'statut' => $request->statut,
                    'quantite' => $request->quantite,
                    'image' => $file,
                ]

            );

            if ($tb) {
                Toastr::success('Voiture ajoutée avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
                return back();
            } else {

                Toastr::error('L\' ajout a échoué', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
                return back();
            }
        } else {

            Toastr::error('L\' ajout a échoué, veuillez choisir une image', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        $test = $voiture->update(

            [
                    'marque' => $request->marque,
                    'model' => $request->model,
                    'couleur' => $request->couleur,
                    'statut' => $request->statut,
                    'quantite' => $request->quantite,
            ]

        );

        if ($test) {
            Toastr::success('Voiture modifiée avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
            return back();
        } else {

            Toastr::error('La modification a échoué', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $test=$voiture->delete();
 
            if($test){
                Toastr::success('Voiture supprimée avec succes','succes',["iconClass"=>"customer-g","positionClass"=>"toast-top-center"]);
                return back();
            }else{
               
                    Toastr::error('La suppression a échoué','erreur',["iconClass"=>"customer-r","positionClass"=>"toast-top-center"]);
                    return back();
                    
                }
    }
}
