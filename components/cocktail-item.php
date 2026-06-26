<div class="col-12 my-3">
    <div class="card">
        <div class="row">
            <div class="col-2">
                <img src="<?= $cocktail['strDrinkThumb'] ?>" class="img-fluid object-fit-cover h-100"
                                                  alt="...">
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <h5 class="card-title"><?= $cocktail['strDrink'] ?></h5>
                    <p class="h5 text-secondary"><?= $cocktail['strCategory'] ?></p>
                    <p class="card-text"><?= substr($cocktail['strInstructionsFR'], 0, 300);
                        if (strlen($cocktail['strInstructionsFR']) > 300) echo "..."; ?></p>
                    <ul>
                        <?php for ($i = 1; $i <= 15; $i++):
                            if ($cocktail['strIngredient' . $i]):?>
                                <li><?= $cocktail['strIngredient' . $i] ?></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                    <a class="btn btn-secondary" href="/add.php?id=<?= $cocktail['idDrink'] ?>">Ajouter à la base</a>
                </div>
            </div>
        </div>
    </div>
</div>
