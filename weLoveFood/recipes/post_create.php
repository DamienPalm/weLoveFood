<?php
session_start();

include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');


if (
    !isset($_POST['title'])
    || !isset($_POST['recipe'])
) {
    echo "Il faut un titre et une recette pour soumettre le formulaire.";
    return;
}

$title = $_POST['title'];
$recipe = $_POST['recipe'];

$insertRecipe = $mysqlClient->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    'author' => $loggedUser['email'],
]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once($rootPath . '/tests/header.php'); ?>

    <div class="container">

        <h1>Recette ajoutée avec succès !</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $title ?></h5>
                <p class="card-text"><b>Email</b> : <?= $loggedUser['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?= strip_tags($recipe); ?></p>
            </div>
        </div>

    </div>

    <?php include_once($rootPath . '/tests/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>