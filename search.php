<?php
if (!isset($_POST['cocktailName'])) {
    $error = "emptyVar";
    header("location: /?error_name=$error");
}

$cocktailName = $_POST['cocktailName'];
$cocktails = json_decode(file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/search.php?s=$cocktailName"), true);

?>

<?php
$pageTitle = 'Search';
include __DIR__ . '/components/header.php'; ?>

<?php if (!$cocktails['drinks']): ?>
<p class="h2 py-4">Aucun cocktail n'est trouvé</p>
<?php else: ?>
    <p class="h2 py-4">Résultats pour : <?= $cocktailName ?></p>
    <?php foreach ($cocktails['drinks'] as $cocktail): ?>
        <?php include __DIR__ . '/components/cocktail-item.php'; ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php include __DIR__ . '/components/footer.php'; ?>
