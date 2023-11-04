<?php session_start();

if (!isset($_POST['email']) || !isset($_POST['message'])) {
    echo ('Il faut un email et un message pour soumettre le formulaire.');
    return;
}

$email = $_POST['email'];
$message = $_POST['message'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Contact reçue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once($rootPath . 'header.php') ?>

    <div class="container">

        <h1>Message bien reçu !</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de vos infomations</h5>
                <p class="card-text"><b>Email</b> : <?= ($email); ?></p>
                <p class="card-text"><b>Message</b> : <?= strip_tags($message); ?></p>
            </div>
        </div>
    </div>

    <?php include_once($rootPath . 'footer.php') ?>
</body>

</html>