<?php
$pageTitle = 'Index';
include __DIR__ . '/components/header.php'; ?>

<div class="row my-5">
    <div class="col"><h1>Page de recherche</h1></div>
</div>

<div class="row">
    <div class="col-2"><a href="list.php" class="btn btn-secondary">Liste des cocktails enregistrés</a></div>
    <div class="col-4 offset-6">
        <form action="search.php" method="POST">
            <div class="mb-3">
                <label for="cocktailName" class="form-label">Nom du cocktail :</label>
                <input type="text" id="cocktailName" name="cocktailName" class="form-control">
            </div>

            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
    </div>
</div>


<?php include __DIR__ . '/components/footer.php'; ?>
