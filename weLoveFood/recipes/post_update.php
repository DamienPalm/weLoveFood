<?php
session_start();

include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');

$postData = $_POST;

if (
    !isset($postData['id'])
    || !isset($postData['title'])
    || !isset($postData['recipe'])
) {
    echo ("Il manque des informations pour permettre l'édiion du fomulaire");
    return;
}

$id = $postData['id'];
$title = $postData['title'];
$recipe = $postData['recipe'];

$insertRecipeStatement = $mysqlClient->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id');
$insertRecipeStatement->execute([
    'title' => $title,
    'recipe' => $recipe,
    'id' => $id,
]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recette - Modification de recette</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once($rootPath . '/tests/header.php'); ?>

    <h3>Recette modifiée avec succès !</h3>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $title ?></h5>
            <p class="card-text"><b>Email</b> : <?= $loggedUser['email']; ?></p>
            <p class="card-text"><b>Recette</b> : <?= strip_tags($recipe); ?></p>
        </div>
    </div>

    <?php include_once($rootPath . '/tests/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>