<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les devises depuis la base de données
        $currencies = Currency::all();

        // Renvoyer la liste des devises sous forme de réponse JSON
        return response()->json(['currencies' => $currencies], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données reçues depuis la requête
        $request->validate([
            'code' => 'required|string|unique:currencies',
            'name' => 'required|string',
        ]);

        // Créer une nouvelle devise avec les données reçues
        $currency = new Currency();
        $currency->code = $request->input('code');
        $currency->name = $request->input('name');
        $currency->save();

        // Retourner la nouvelle devise en réponse JSON
        return response()->json(['currency' => $currency], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Récupérer la devise par son identifiant
        $currency = Currency::find($id);

        if (!$currency) {
            // Retourner une réponse JSON avec un message d'erreur si la devise n'est pas trouvée
            return response()->json(['message' => 'Devise introuvable'], 404);
        }

        // Retourner la devise en réponse JSON
        return response()->json(['currency' => $currency], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données reçues depuis la requête
        $request->validate([
            'code' => 'string|unique:currencies',
            'name' => 'string',
        ]);

        // Récupérer la devise par son identifiant
        $currency = Currency::find($id);

        if (!$currency) {
            // Retourner une réponse JSON avec un message d'erreur si la devise n'est pas trouvée
            return response()->json(['message' => 'Devise introuvable'], 404);
        }

        // Mettre à jour la devise avec les données reçues depuis la requête
        if ($request->has('code')) {
            $currency->code = $request->input('code');
        }

        if ($request->has('name')) {
            $currency->name = $request->input('name');
        }

        $currency->save();

        // Retourner la devise mise à jour en réponse JSON
        return response()->json(['currency' => $currency], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Récupérer la devise par son identifiant
        $currency = Currency::find($id);

        if (!$currency) {
            // Retourner une réponse JSON avec un message d'erreur si la devise n'est pas trouvée
            return response()->json(['message' => 'Devise introuvable'], 404);
        }

        // Supprimer la devise de la base de données
        $currency->delete();

        // Retourner une réponse JSON avec un message de succès
        return response()->json(['message' => 'Devise supprimée avec succès'], 200);
    }
}
