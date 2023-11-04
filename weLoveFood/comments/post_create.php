<?php
session_start();

include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');
include_once('../functions.php');

$postData = $_POST;

if (
    !isset($postData['comment']) &&
    !isset($postData['recipe_id']) &&
    !isset($postData['review']) &&
    !is_numeric($postData['recipe_id']) &&
    !is_numeric($postData['recipe_id'])
) {
    echo ('Le commentaire est invalide.');
    return;
}

if (!isset($loggedUser)) {
    echo ('Vous devez être authentifié pour soumettre un commentaire');
    return;
}

$comment = $postData['comment'];
$recipeId = $postData['recipe_id'];
$review = $postData['review'];

$insertComment = $mysqlClient->prepare('INSERT INTO comments(user_id, recipe_id, comment, review) VALUES (:user_id, :recipe_id, :comment, :review)');
$insertComment->execute([
    'user_id' => retrieveIdFromUserEmail($loggedUser['email'], $users),
    'recipe_id' => $recipeId,
    'comment' => $comment,
    'review' => (int) $review,
]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de commentaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once($rootPath . '/tests/header.php'); ?>

    <div class="container">
        <h1>Commentaire ajouté avec succès !</h1>

        <div class="card">
            <div class="card-body">
                <p class="card-text"><b>Note</b> : <?= $review ?></p>
                <p class="card-text"><b>Votre commentaire</b> : <?= strip_tags($comment); ?></p>
            </div>
        </div>
    </div>

    <?php include_once($rootPath . '/tests/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>