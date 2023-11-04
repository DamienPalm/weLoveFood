<?php
session_start();

include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');


if (!isset($_POST['id'])) {
    echo "Il faut un idenifiant valide pour supprime la recette.";
    return;
}

$id = $_POST['id'];

$deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id =:id');
$deleteRecipeStatement->execute([
    'id' => $id,
]) or die(print_r($mysqlClient->errorInfo()));

header('Location: ' . $rootUrl . 'tests/home.php');
