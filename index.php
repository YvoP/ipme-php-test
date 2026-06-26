<?php
$pageTitle = 'Index';
include __DIR__ . '/components/header.php'; ?>

<div class="row my-5">
    <div class="col"><h1>Page de recherche</h1></div>
</div>

<div class="row">
    <div class="col-6l"><a href="list.php" class="btn btn-secondary">Liste des cocktails enregistrés</a></div>
    <div class="col-6">
        <form action="search.php" method="POST">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="cocktailName" class="col-form-label">Nom du cocktail :</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="cocktailName" name="cocktailName" class="form-control" placeholder="ex: margarita">
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-secondary">Rechercher</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php include __DIR__ . '/components/footer.php'; ?>
