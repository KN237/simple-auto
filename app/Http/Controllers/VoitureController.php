<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Client\Response;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::where('statut', 'Disponible')->get();
        $clients = Client::all();
        $images = Image::all();
        $string = 'Disponibles';
        return view('voiture', compact('voitures', 'clients', 'string', 'images'));
    }

    public function vendu()
    {
        $voitures = Voiture::where('statut', '<>', 'Disponible')->get();
        $clients = Client::all();
        $string = 'Vendues';
        $images = Image::all();
        return view('voiture', compact('voitures', 'clients', 'string', 'images'));
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


        $tb = Voiture::create(

            [
                'marque' => $request->marque,
                'model' => $request->model,
                'couleur' => $request->couleur,
                'statut' => $request->statut,
            ]

        );

        if ($request->hasfile('images')) {

            foreach ($request->images as $imagefile) {
                
                $image = new Image;
                $file = uniqid() . "." . $imagefile->getClientOriginalName();
                $imagefile->storeAs('voitures', $file, 'public');
                $image->url = 'storage/voitures/' . $file;
                $image->id_v = $tb->id;
                $image->save();
            }
        }

        if ($tb) {
            Toastr::success('Voiture ajoutée avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
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
    public function update(Request $request, Voiture $voiture)
    {
        $test = $voiture->update(

            [
                'marque' => $request->marque,
                'model' => $request->model,
                'couleur' => $request->couleur,
                'statut' => $request->statut,
            ]

        );
        
        if ($request->hasfile('images')) {
            
            foreach ($request->images as $imagefile) {
                
                $image = new Image;
                $file = uniqid() . "." . $imagefile->getClientOriginalName();
                $imagefile->storeAs('voitures', $file, 'public');
                $image->url = 'storage/voitures/' . $file;
                $image->id_v = $voiture->id;
                $image->save();
            }
        }

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
        $test = $voiture->delete();


        if ($test) {
            Toastr::success('Voiture supprimée de votre liste avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
            return back();
        } else {

            Toastr::error('La suppréssion a échoué', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
            return back();
        }
    }
}
