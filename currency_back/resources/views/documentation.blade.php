<!DOCTYPE html>
<html>
<head>
    <title>Documentation API</title>
    <!-- Ajoutez le lien vers la feuille de style Bootstrap ici -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
    <h1 class="mt-4">Documentation API</h1>

    <h2 class="mt-4">Liste des devises</h2>
    <pre>
        <code>GET /api/currencies</code>
    </pre>

    <h2 class="mt-4">Créer une devise</h2>
    <pre>
        <code>POST /api/currencies</code>
        Content-Type: application/json

        {
            "name": "Nom de la devise",
            "code": "Code de la devise"
        }
    </pre>

    <h2 class="mt-4">Mettre à jour une devise</h2>
    <pre>
        <code>PUT /api/currencies/{id}</code>
        Content-Type: application/json

        {
            "name": "Nouveau nom de la devise",
            "code": "Nouveau code de la devise"
        }
    </pre>

    <h2 class="mt-4">Supprimer une devise</h2>
    <pre>
        <code>DELETE /api/currencies/{id}</code>
    </pre>

    <h2 class="mt-4">Liste des paires de conversion</h2>
    <pre>
        <code>GET /api/pairs</code>
    </pre>

    <h2 class="mt-4">Créer une paire de conversion</h2>
    <pre>
        <code>POST /api/pairs</code>
        Content-Type: application/json

        {
            "currency_from": "Code de la devise de départ",
            "currency_to": "Code de la devise d'arrivée",
            "rate": "Taux de conversion"
        }
    </pre>

    <h2 class="mt-4">Mettre à jour une paire de conversion</h2>
    <pre>
        <code>PUT /api/pairs/{id}</code>
        Content-Type: application/json

        {
            "rate": "Nouveau taux de conversion"
        }
    </pre>

    <h2 class="mt-4">Supprimer une paire de conversion</h2>
    <pre>
        <code>DELETE /api/pairs/{id}</code>
    </pre>

    <h2 class="mt-4">Effectuer une conversion</h2>
    <pre>
        <code>POST /api/convert</code>
        Content-Type: application/json

        {
            "currency_from": "Code de la devise de départ",
            "currency_to": "Code de la devise d'arrivée",
            "amount": "Montant à convertir"
        }
    </pre>

    <!-- Ajoutez le lien vers le script Bootstrap ici -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
