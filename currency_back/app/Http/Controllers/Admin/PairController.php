<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pair;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pairs = Pair::with('sourceCurrency', 'targetCurrency')->get();

        return response()->json([
            'pairs' => $pairs,
        ], 200);
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
            'rate' => 'required|numeric',
        ]);

        // Créer une nouvelle paire de conversion avec les données reçues
        $pair = new Pair();
        $pair->currency_from = $request->input('currency_from');
        $pair->currency_to = $request->input('currency_to');
        $pair->rate = $request->input('rate');
        $pair->save();

        // Retourner la nouvelle paire de conversion en réponse JSON
        return response()->json([
            'pair' => $pair,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Récupérer la paire de conversion par son identifiant
        $pair = Pair::with('sourceCurrency', 'targetCurrency')->find($id);

        if (!$pair) {
            // Retourner une réponse JSON avec un message d'erreur si la paire n'est pas trouvée
            return response()->json([
                'message' => 'Paire de conversion introuvable',
            ], 404);
        }

        // Retourner la paire de conversion en réponse JSON
        return response()->json([
            'pair' => $pair,
        ], 200);
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
            'rate' => 'numeric',
        ]);

        // Récupérer la paire de conversion par son identifiant
        $pair = Pair::find($id);

        if (!$pair) {
            // Retourner une réponse JSON avec un message d'erreur si la paire n'est pas trouvée
            return response()->json([
                'message' => 'Paire de conversion introuvable',
            ], 404);
        }

        // Mettre à jour la paire de conversion avec les données reçues depuis la requête
        if ($request->has('currency_from')) {
            $pair->currency_from = $request->input('currency_from');
        }

        if ($request->has('currency_to')) {
            $pair->currency_to = $request->input('currency_to');
        }

        if ($request->has('rate')) {
            $pair->rate = $request->input('rate');
        }

        $pair->save();

        // Retourner la paire de conversion mise à jour en réponse JSON
        return response()->json([
            'pair' => $pair,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Récupérer la paire de conversion par son identifiant
        $pair = Pair::find($id);

        if (!$pair) {
            // Retourner une réponse JSON avec un message d'erreur si la paire n'est pas trouvée
            return response()->json([
                'message' => 'Paire de conversion introuvable',
            ], 404);
        }

        // Supprimer la paire de conversion de la base de données
        $pair->delete();

        // Retourner une réponse JSON avec un message de succès
        return response()->json([
            'message' => 'Paire de conversion supprimée avec succès',
        ], 200);
    }
}
