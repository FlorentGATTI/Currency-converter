<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validez les données du formulaire de connexion
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentez de connecter l'utilisateur en utilisant les informations fournies
        if (auth()->attempt($request->only('email', 'password'))) {
            // La connexion a réussi
            return response()->json(['success' => true]);
        } else {
            // La connexion a échoué
            return response()->json(['success' => false, 'message' => 'Identifiants incorrects']);
        }
    }

    // Méthode pour gérer la déconnexion
    public function logout(Request $request)
    {
        // Déconnecter l'utilisateur
        auth()->logout();

        // Rediriger l'utilisateur vers la page de connexion après la déconnexion
        return response()->json(['success' => true]);
    }
}
