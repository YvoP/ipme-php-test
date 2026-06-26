<?php
include __DIR__ . '/components/pdo.php';


$sqlRequest = 'SELECT * FROM cocktail';
$stmt = $pdo->prepare($sqlRequest);
$stmt->execute();
$cocktails = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'List';
include __DIR__ . '/components/header.php'; ?>

<?php if (!$cocktails): ?>
    <p class="h2 py-4">Aucun cocktail n'est trouvé</p>
<?php else: ?>
    <p class="h2 py-4">Cocktails insérés dans la base de donnée</p>
    <?php foreach ($cocktails as $cocktail): ?>
        <?php include __DIR__ . '/components/cocktail-item-db.php'; ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php include __DIR__ . '/components/footer.php'; ?>
