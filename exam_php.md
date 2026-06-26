# Examen – Application de gestion de cocktails

**Durée : 3h30**

## Contexte

Vous allez développer une petite application web en **PHP** permettant de rechercher des cocktails via une API externe ([TheCocktailDB](https://www.thecocktaildb.com/api.php)), puis d'enregistrer ceux de votre choix dans une base de données MySQL.

La base de données vous est **fournie** : vous devez simplement l'importer dans votre **phpMyAdmin** (fichier `.sql` joint) avant de commencer. Vérifiez bien le nom de la base, de la table et des colonnes après l'import.

> L'utilisation de **Bootstrap n'est pas obligatoire**, et aucun style n'est exigé pour valider l'examen. Concentrez-vous d'abord sur le fonctionnement.

---

## Pages à réaliser

Vous devez créer les pages suivantes. **Respectez ces noms de fichiers.**

### 1. `header.php`

Le début commun à toutes vos pages : `<!doctype html>`, la balise `<head>` (charset, viewport, titre) et l'ouverture du `<body>`. Ce fichier sera inclus en haut de chaque page.

### 2. `footer.php`

La fin commune à toutes vos pages : fermeture des balises ouvertes dans le header (`</body>`, `</html>`, etc.). Inclus en bas de chaque page.

### 3. `index.php` – Page de recherche

La page d'accueil. Elle contient :

- Un titre.
- Un **lien** vers la page listant les cocktails enregistrés (`list.php`).
- Un **formulaire** avec un champ texte permettant de saisir le nom d'un cocktail. Ce formulaire envoie ses données en **POST** vers la page `search.php`.

### 4. `search.php` – Affichage des résultats de recherche

Cette page :

- Récupère le nom du cocktail envoyé depuis le formulaire (en POST).
- Interroge l'API de recherche par nom :
  `https://www.thecocktaildb.com/api/json/v1/1/search.php?s=NOM_DU_COCKTAIL`
- Décode la réponse JSON.
- Affiche **chaque cocktail trouvé** (au minimum son nom).
- Pour chaque cocktail affiché, propose un **bouton/lien « Ajouter »** qui pointe vers `add.php?id=ID_DU_COCKTAIL`, où l'`id` est l'identifiant du cocktail renvoyé par l'API.
- Si **aucun cocktail n'est trouvé**, affiche un message adapté (« Aucun cocktail trouvé »).
- Propose un lien pour revenir à la recherche.

> **Attention (piège) :** quand l'API ne trouve aucun résultat, la clé `drinks` ne renvoie pas un tableau vide mais la valeur `null`. Vous devez tester ce cas correctement (ex : `if ($data['drinks'] === null)`) **avant** de tenter une boucle, sinon vous générerez une erreur.

### 5. `add.php` – Enregistrement d'un cocktail

Cette page **n'affiche rien** : elle traite et redirige. Elle :

- Se connecte à la base de données (PDO).
- Récupère l'`id` passé dans l'URL (en GET).
- Interroge l'API de **détail** par identifiant :
  `https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=ID`
- Vérifie si le cocktail existe **déjà** en base (recherche sur l'identifiant de l'API). 
  - S'il existe déjà : **on ne l'insère pas** (pas de doublon).
  - Sinon : on l'insère (nom, identifiant de l'API, instructions).
- **Redirige** ensuite vers `list.php`.

> **Attention (piège important) :** l'API de détail (`lookup.php?i=`) renvoie **un tableau de cocktails**, même quand il n'y en a qu'un seul. Vous devez donc accéder au premier élément avec `[0]` pour lire les données.
> Exemple : `$data['drinks'][0]['strDrink']` et non `$data['drinks']['strDrink']`.

### 6. `list.php` – Liste des cocktails enregistrés

Cette page :

- Se connecte à la base de données (PDO).
- Récupère **tous** les cocktails enregistrés.
- Les affiche (au minimum leur nom).
- Si **aucun** cocktail n'est enregistré, affiche un message adapté.
- Propose un lien pour revenir à la recherche.

---

## Points clés évalués

- Inclusion correcte du `header.php` et du `footer.php` sur les pages concernées.
- Récupération et passage des données via **GET** et **POST** (formulaire, paramètres d'URL).
- Appel à une **API externe** et décodage du **JSON**.
- Connexion à la base via **PDO** et utilisation de **requêtes préparées**.
- Gestion de la logique **éviter les doublons** à l'insertion.
- Bonne gestion des deux **pièges** signalés ci-dessus (`drinks` à `null`, tableau `[0]` sur le lookup par id).
- Utilisation correcte des **redirections** (`header('Location: ...')`).

---

## Bonus

Le style n'est pas obligatoire, mais **un projet bien présenté peut rapporter des points supplémentaires** :

- Intégration de **Bootstrap** (ou d'un CSS personnalisé) pour une mise en page propre (cartes, grille, boutons…).
- Affichage de **plus d'informations** sur les cocktails (image, instructions, ingrédients…).
- Soin général, lisibilité du code, messages clairs pour l'utilisateur.

Bon courage !
