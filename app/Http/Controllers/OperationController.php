<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Client;
use App\Models\Voiture;
use App\Models\Operation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $operations = Operation::all();
        $voitures = Voiture::where('statut', 'Disponible')->get();
        $images = Image::all();
        return view('operation', compact('clients', 'operations', 'voitures','images'));
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
        $operation = Operation::create(

            [
                'montant' => $request->montant,
                'date' => $request->date,
                'id_v' => $request->id_v,
                'id_cl' => $request->id_cl,

            ]

        );

        $voiture=Voiture::where('id',$request->id_v)->first();
        $voiture->update(['statut'=>'Pas disponible']);

        if ($operation) {
            Toastr::success('opération ajoutée avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
            return back();
        } else {

            Toastr::error('La création a échoué', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        $test = $operation->delete();

        if ($test) {
            Toastr::success('Opération supprimée de votre liste avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
            return back();
        } else {

            Toastr::error('La suppréssion a échoué', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
            return back();
        }
    }
}
