<?php session_start(); // $_SESSION 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <div class="container">

        <!-- Formulaire de connexion -->
        <?php include_once('login.php'); ?>

        <h1>Site de recette</h1>

        <?php foreach (getRecipes($recipes, $limit) as $recipe) : ?>
            <article>
                <h3><a href="./recipes/read.php?id=<?= $recipe['recipe_id'] ?>"><?= $recipe['title']; ?></a></h3>
                <div><?= $recipe['recipe']; ?></div>
                <i><?= displayAuthor($recipe['author'], $users) ?></i>
                <?php if (isset($loggedUser) && $recipe['author'] === $loggedUser['email']) : ?>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><a href="./recipes/update.php?id=<?= $recipe['recipe_id'] ?>" class="link-warning">Editer l'article</a></li>
                        <li class="list-group-item"><a href="./recipes/delete.php?id=<?= $recipe['recipe_id'] ?>" class="link-danger">Supprimer l'article</a></li>
                    </ul>
                <?php endif ?>
            </article>
        <?php endforeach ?>
    </div>

    <!-- Pied de page -->
    <?php include_once('footer.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>