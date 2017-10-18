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
    $tab .= "<td><a href='index.php?case=a1' title='Choisir la case A1'>A1</a></td>";
    $tab .= "<td><a href='index.php?case=b1' title='Choisir la case B1'>B1</a></td>";
    $tab .= "<td><a href='index.php?case=c1' title='Choisir la case C1'>C1</a></td>";
    $tab .= "</tr>";
    $tab .= "<tr>";
    $tab .= "<td><a href='index.php?case=a2' title='Choisir la case A2'>A2</a></td>";
    $tab .= "<td><a href='index.php?case=b2' title='Choisir la case B2'>B2</a></td>";
    $tab .= "<td><a href='index.php?case=c2' title='Choisir la case C2'>C2</a></td>";
    $tab .= "<tr>";
    $tab .= "<td><a href='index.php?case=a3' title='Choisir la case A3'>A3</a></td>";
    $tab .= "<td><a href='index.php?case=b3' title='Choisir la case B3'>B3</a></td>";
    $tab .= "<td><a href='index.php?case=c3' title='Choisir la case C3'>C3</a></td>";
    $tab .= "</tr>";
    $tab .= "</table>";

    return $tab;
}