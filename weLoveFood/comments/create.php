<?php
include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo "L'identifiant de la recette est manquant ou non valide";
    exit();
}

$recipeId = $getData['id'];

?>

<form action="<?= $rootUrl . 'tests/comments/post_create.php'; ?>" method="post">
    <div class="mb-3 visually-hidden">
        <input type="text" name="recipe_id" value="<?= $recipeId; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Evaluez la recette (de 1 à 5)</label>
        <input type="number" class="form-control" name="review" id="review" min="0" max="5" step="1">
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Postez un commentaire</label>
        <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Soyez respectueux.se, nous sommes humain.e.s"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>