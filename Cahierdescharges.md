<strong>Cahier des charges - Conversion Monétaire</strong> 
<details>
<summary><strong>Analyse client</strong></summary>
MoneyValue est une startup du domaine de la finance qui souhaite développer une plateforme de conversion monétaire. L'objectif est de fournir un service public et gratuit permettant aux utilisateurs de convertir des devises. L'application doit être développée en utilisant Laravel comme framework back-end et Vue.js comme framework front-end.

</details>
<details>
<summary><strong>Choix technologiques</strong></summary>
Côté administration (front-end)
Le choix de Vue.js pour le front-end a été motivé par sa facilité d'utilisation, sa flexibilité et son écosystème riche de bibliothèques et de plugins. Vue.js permettra de créer une interface utilisateur réactive et conviviale pour l'administration.

Côté API (back-end)
L'utilisation de Laravel comme framework back-end a été choisie pour plusieurs raisons. Laravel est un framework PHP populaire qui offre une structure solide pour le développement d'applications web. Il fournit des fonctionnalités avancées telles que la gestion des routes, les contrôleurs de ressources, l'ORM Eloquent pour interagir avec la base de données, ainsi que des outils de validation et d'authentification intégrés.

</details>
<details>
<summary><strong>Evaluation du temps de travail</strong></summary>
Voici une estimation approximative du temps de travail pour chaque grand poste de développement (en jours de travail) :

<table>
  <thead>
    <tr>
      <th>Poste de développement</th>
      <th>Durée estimée</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Configuration initiale</td>
      <td>1</td>
    </tr>
    <tr>
      <td>Développement de l'API</td>
      <td>3</td>
    </tr>
    <tr>
      <td>Développement de l'administration</td>
      <td>2</td>
    </tr>
    <tr>
      <td>Gestion de la base de données</td>
      <td>1</td>
    </tr>
    <tr>
      <td>Tests et débogage</td>
      <td>0.5</td>
    </tr>
    <tr>
      <td>Documentation</td>
      <td>0.5</td>
    </tr>
    <tr>
      <th>Total</th>
      <th>7</th>
    </tr>
  </tbody>
</table>
Veuillez noter que ces estimations peuvent varier en fonction de votre expérience, des spécificités du projet et de la complexité des fonctionnalités.

</details>
<details>
<summary><strong>Liste fonctionnelle</strong></summary>
- Administration</br>
- Système d'authentification pour l'accès à l'administration</br>
- Affichage de la liste des paires de conversion supportées</br>
- Ajout, modification et suppression d'une paire de conversion</br>
- Affichage du nombre de requêtes effectuées pour chaque paire</br>
- API</br>
- Endpoint pour vérifier si le service est fonctionnel</br>
- Endpoint pour récupérer la liste des paires de conversion supportées</br>
- Endpoint pour effectuer une conversion de devise selon une paire existante</br>
</details>
<details>
<summary><strong>Recettage</strong></summary>
<table>
  <thead>
    <tr>
      <th>Fonctionnalité</th>
      <th>Opérationnelle</th>
      <th>Observation</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Système d'authentification</td>
      <td>Oui</td>
      <td>Seulement Admin, générer par le seeders</td>
    </tr>
    <tr>
      <td>Affichage des paires de conversion</td>
      <td>Oui</td>
      <td></td>
    </tr>
    <tr>
      <td>Ajout d'une paire de conversion</td>
      <td>Oui</td>
      <td></td>
    </tr>
    <tr>
      <td>Modification d'une paire de conversion</td>
      <td>Oui</td>
      <td></td>
    </tr>
    <tr>
      <td>Suppression d'une paire de conversion</td>
      <td>Oui</td>
      <td></td>
    </tr>
    <tr>
      <td>Affichage du nombre de requêtes</td>
      <td>Oui</td>
      <td></td>
    </tr>
    <tr>
      <td>Vérification du service</td>
      <td>Oui</td>
      <td></td>
    </tr>
    <tr>
      <td>Récupération des paires de conversion</td>
      <td>Oui</td>
      <td></td>
    </tr>
    <tr>
      <td>Conversion de devise</td>
      <td>Oui</td>
      <td></td>
    </tr>
  </tbody>
</table>
</details>
<details>
<summary><strong>Diagramme de la base de données</strong></summary>

![Diagramme de la base de données](./diagram-projet.png)

"Je met le link ici au cas ou le diagramme ne s'affiche pas"
https://dbdiagram.io/d/64b662bc02bd1c4a5e43748c

<summary><strong>Wireframe</strong></summary>
<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="800" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FQTi7qBhetmWTMlXmrq0xh7%2FUntitled%3Ftype%3Ddesign%26node-id%3D0%253A1%26mode%3Ddesign%26t%3DGUJFTLl8E8qN0DkW-1" allowfullscreen></iframe>

<summary><strong>Adresse Github</strong></summary>
<p>https://github.com/FlorentGATTI/Currency-converter</p>