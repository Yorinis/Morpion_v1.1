<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/10/2017
 * Time: 21:23
 */

/**
 * @return string
 * Retourne l'affichage du formulaire de connexion
 */
function viewFormNewPlayer()
{
    $form  = "<form action='index.php' method='post'>";
    $form .= "<input type='text' name='player1_name' placeholder='Joueur 1' required />";
    $form .= "<input type='text' name='player2_name' placeholder='Joueur 2' required />";
    $form .= "<input type='submit' value='Jouer !' />";

    return $form;
}

/**
 * @return string
 * Retourne l'affichage du tableau de jeu
 */
function viewGameBoard()
{
    $tab  = "<table border='1'>";
    $tab .= "<tr>";
    $tab .= "<td>a</td>";
    $tab .= "<td>b</td>";
    $tab .= "<td>c</td>";
    $tab .= "</tr>";
    $tab .= "<tr>";
    $tab .= "<td>a</td>";
    $tab .= "<td>b</td>";
    $tab .= "<td>c</td>";
    $tab .= "</tr>";
    $tab .= "<tr>";
    $tab .= "<td>a</td>";
    $tab .= "<td>b</td>";
    $tab .= "<td>c</td>";
    $tab .= "</tr>";
    $tab .= "</table>";

    return $tab;
}