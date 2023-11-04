<?php
session_start();

include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id'])) {
    echo "La recette n'existe pas";
    return;
}

$recipeId = $getData['id'];

$retrieveRecipeWithCommentsStatement = $mysqlClient->prepare('SELECT *,DATE_FORMAT(c.created_at, "%d/%m/%Y") AS comment_date FROM recipes r LEFT JOIN comments c ON r.recipe_id = c.recipe_id WHERE r.recipe_id = :id');
$retrieveRecipeWithCommentsStatement->execute([
    'id' => $recipeId,
]);

$recipeWithComments = $retrieveRecipeWithCommentsStatement->fetchAll(PDO::FETCH_ASSOC);

$averageRaingStatement = $mysqlClient->prepare('SELECT ROUND(AVG(c.review),1) AS rating FROM  recipes r LEFT JOIN comments c ON r.recipe_id = c.recipe_id WHERE r.recipe_id = :id');
$averageRaingStatement->execute([
    'id' => $recipeId
]);

$averageRating = $averageRaingStatement->fetch(PDO::FETCH_ASSOC);

$recipe = [
    'recipe_id' => $recipeWithComments[0]['recipe_id'],
    'title' => $recipeWithComments[0]['title'],
    'recipe' => $recipeWithComments[0]['recipe'],
    'author' => $recipeWithComments[0]['author'],
    'comments' => [],
    'rating' => $averageRating['rating'],
];

foreach ($recipeWithComments as $comment) {
    if (!is_null($comment['comment_id'])) {
        $recipe['comments'][] = [
            'comment_id' => $comment['comment_id'],
            'comment' => $comment['comment'],
            'user_id' => (int) $comment['user_id'],
            'created_at' => $comment['comment_date'],
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - <?= $recipe['title'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once($rootPath . '/tests/header.php'); ?>

    <div class="container">
        <h1><?= $recipe['title'] ?></h1>

        <div class="row">
            <article class="col">
                <?= $recipe['recipe']; ?>
            </article>
            <aside class="col">
                <p><i>Contribué par <?= $recipe['author'] ?></i></p>
                <p><b>Evaluée par la communauté à <?= $recipe['rating']; ?> /5</b></p>
            </aside>
        </div>

        <?php if (count($recipe['comments']) > 0) : ?>
            <hr />

            <h2>Commentaire</h2>
            <div class="row">

                <?php foreach ($recipe['comments'] as $comment) : ?>
                    <div class="card m-1">
                        <div class="card-body">
                            <p class="card-text"><?= $comment['created_at']; ?></p>
                            <p class="card-text"><?= $comment['comment']; ?></p>
                            <i class="card-text"><?= displayUser($comment['user_id'], $users); ?></i>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <hr />

        <?php if (isset($loggedUser)) : ?>
            <?php include_once($rootPath . '/tests/comments/create.php'); ?>
        <?php endif ?>

    </div>

    <?php include_once($rootPath . '/tests/footer.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>