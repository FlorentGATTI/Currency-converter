<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversions;
use Illuminate\Http\Request;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les conversions depuis la base de données
        $conversions = Conversions::all();

        // Renvoyer la liste des conversions sous forme de réponse JSON
        return response()->json(['conversions' => $conversions], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données reçues depuis la requête
        $request->validate([
            'currency_from' => 'required|exists:currencies,id',
            'currency_to' => 'required|exists:currencies,id',
            'amount' => 'required|numeric',
            'result' => 'required|numeric',
        ]);

        // Créer une nouvelle conversion avec les données reçues
        $conversion = new Conversions();
        $conversion->currency_from = $request->input('currency_from');
        $conversion->currency_to = $request->input('currency_to');
        $conversion->amount = $request->input('amount');
        $conversion->result = $request->input('result');
        $conversion->save();

        // Retourner la nouvelle conversion en réponse JSON
        return response()->json(['conversion' => $conversion], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Récupérer la conversion par son identifiant
        $conversion = Conversions::find($id);

        if (!$conversion) {
            // Retourner une réponse JSON avec un message d'erreur si la conversion n'est pas trouvée
            return response()->json(['message' => 'Conversion introuvable'], 404);
        }

        // Retourner la conversion en réponse JSON
        return response()->json(['conversion' => $conversion], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données reçues depuis la requête
        $request->validate([
            'currency_from' => 'exists:currencies,id',
            'currency_to' => 'exists:currencies,id',
            'amount' => 'numeric',
            'result' => 'numeric',
        ]);

        // Récupérer la conversion par son identifiant
        $conversion = Conversions::find($id);

        if (!$conversion) {
            // Retourner une réponse JSON avec un message d'erreur si la conversion n'est pas trouvée
            return response()->json(['message' => 'Conversion introuvable'], 404);
        }

        // Mettre à jour la conversion avec les données reçues depuis la requête
        if ($request->has('currency_from')) {
            $conversion->currency_from = $request->input('currency_from');
        }

        if ($request->has('currency_to')) {
            $conversion->currency_to = $request->input('currency_to');
        }

        if ($request->has('amount')) {
            $conversion->amount = $request->input('amount');
        }

        if ($request->has('result')) {
            $conversion->result = $request->input('result');
        }

        $conversion->save();

        // Retourner la conversion mise à jour en réponse JSON
        return response()->json(['conversion' => $conversion], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Récupérer la conversion par son identifiant
        $conversion = Conversions::find($id);

        if (!$conversion) {
            // Retourner une réponse JSON avec un message d'erreur si la conversion n'est pas trouvée
            return response()->json(['message' => 'Conversion introuvable'], 404);
        }

        // Supprimer la conversion de la base de données
        $conversion->delete();

        // Retourner une réponse JSON avec un message de succès
        return response()->json(['message' => 'Conversion supprimée avec succès'], 200);
    }
}
