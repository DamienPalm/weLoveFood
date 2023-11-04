<?php session_start();
include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recette - Suppression de la recette !</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once($rootPath . '/tests/header.php'); ?>

    <div class="container">
        <h1>Supprimer la recette ?</h1>

        <form action="<?= $rootUrl . 'tests/recipes/post_delete.php' ?>" method="post">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Idenifiant de la recette</label>
                <input type="hidden" name="id" class="form-control" id="id" value="<?= $_GET['id']; ?>">
            </div>

            <button type="submit" class="btn btn-danger">La suppression est définitive</button>
        </form>
        <br>
    </div>

    <?php include_once($rootPath . '/tests/footer.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>