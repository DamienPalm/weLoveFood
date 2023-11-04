<?php session_start();
include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo ('Il faut un identifiant de recette pour le modifier.');
    return;
}

$retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
$retrieveRecipeStatement->execute([
    'id' => $getData['id'],
]);

$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Edition de recette</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once($rootPath . '/tests/header.php'); ?>

    <div class="container">

        <h1>Mettre à jour <?= $recipe['title'] ?></h1>

        <form action="<?= $rootUrl . 'tests/recipes/post_update.php' ?>" method="post">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input type="hidden" name="id" id="id" class="form-control" value="<?= $getData['id'] ?>">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">titre de la recette</label>
                <input type="text" name="title" id="title" class="form-control" aria-describedby="title-help" value="<?= $recipe['title'] ?>">
                <div id="title-help" class="form-text">Choisissez un titre pecutant</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Desciption de la recette</label>
                <textarea name="recipe" id="recipe" cols="30" rows="10" class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droit">
                    <?= strip_tags($recipe['recipe']) ?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br>
    </div>

    <?php include_once($rootPath . '/tests/footer.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>