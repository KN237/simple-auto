<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client', compact('clients'));
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
        $client = Client::create(

            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'cni' => $request->cni,

            ]

        );

        if ($client) {
            Toastr::success('Client ajouté avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
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
    public function update(Request $request, Client $client)
    {
        $test = $client->update(

            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'cni' => $request->cni,
            ]

        );

        if ($test) {
            Toastr::success('Client modifié avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
            return back();
        } else {

            Toastr::error('La modification a échoué', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $test = $client->delete();

        if ($test) {
            Toastr::success('Client supprimé de votre liste avec succes', 'succes', ["iconClass" => "customer-g", "positionClass" => "toast-top-center"]);
            return back();
        } else {

            Toastr::error('La suppréssion a échoué', 'erreur', ["iconClass" => "customer-r", "positionClass" => "toast-top-center"]);
            return back();
        }
    }
}
