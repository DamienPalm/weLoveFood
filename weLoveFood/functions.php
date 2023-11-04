<?php

function displayRecipe(array $recipe): string
{
    $recipeContent = '';
    if ($recipe['is_enabled']) {
        $recipeContent = '<article>';
        $recipeContent = '<h3>' . $recipe['title'] . '</h3>';
        $recipeContent = '<div>' . $recipe['recipe'] . '</div>';
        $recipeContent = '<i>' . $recipe['author'] . '</i>';
        $recipeContent = '</article>';
    }

    return $recipeContent;
}

function displayAuthor(string $authorEmail, array $users): string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }

    return 'Non touvé.';
}

function displayUser(int $userId, array $users): string
{
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($userId === (int) $user['user_id']) {
            return $user['full_name'] . '(' . $user['age'] . 'ans)';
        }
    }

    return 'Non touvé.';
}

function retrieveIdFromUserEmail(string $userEmail, array $users): int
{
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($userEmail === $user['email']) {
            return  $user['user_id'];
        }
    }

    return 0;
}

function getRecipes(array $recipes, int $limit): array
{
    $validRecipes = [];
    $counter = 0;

    foreach ($recipes as $recipe) {
        if ($counter == $limit) {
            return $validRecipes;
        }
        $validRecipes[] = $recipe;
        $counter++;
    }

    return $validRecipes;
}
