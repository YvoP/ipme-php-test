<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Cocktails !</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($pageTitle == 'Index') echo 'active' ?>" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pageTitle == 'List') echo 'active' ?>" href="/list.php">Liste en db</a>
                </li>
            </ul>
            <form class="d-flex ms-auto" role="search" action="/search.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Cocktail" aria-label="Search" name="cocktailName"/>
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</nav>