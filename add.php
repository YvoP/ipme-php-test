<?php include __DIR__ . '/components/pdo.php';

if (!isset($_GET['id'])) {
    $error = "emptyVar";
    header("location: /error_name=$error");
};

$id = htmlspecialchars($_GET['id']);

$sqlRequest = 'SELECT * FROM cocktail WHERE api_id = :id';
$stmt = $pdo->prepare($sqlRequest);
$stmt->execute([
    'id' => $id
]);
$cocktail = $stmt->fetch(PDO::FETCH_ASSOC);

if ($cocktail) {
    $error = "alreadySaved";
    header("location: /error_name=$error");
} else {
    $cocktails = json_decode(file_get_contents("https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=$id"), true);

    $sqlRequest = 'INSERT INTO cocktail(api_id, name, instruction) VALUES(:api_id, :name, :instruction)';
    $stmt = $pdo->prepare($sqlRequest);
    $stmt->execute([
        'api_id' => $cocktails['drinks'][0]['idDrink'],
        'name' => $cocktails['drinks'][0]['strDrink'],
        'instruction' => $cocktails['drinks'][0]['strInstructionsFR']
    ]);

    header("location: list.php");
}