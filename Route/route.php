<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/10/2017
 * Time: 21:42
 */

# On vérifie si le formulaire des nouveaux joueurs a été envoyé :
# Si oui, on passe le post dans la session et on initialise les paramètres de base du jeu
if(isset($_POST['player1_name']) && isset($_POST['player2_name']))
{
    $_SESSION['player1']['name'] = $_POST['player1_name'];
    $_SESSION['player1']['unit'] = 1;
    $_SESSION['player2']['name'] = $_POST['player2_name'];
    $_SESSION['player2']['unit'] = 2;

    # On initialise l'array du jeu
    $_SESSION['tab_forward'] = array(
        "a1" => 0,
        "a2" => 0,
        "a3" => 0,
        "b1" => 0,
        "b2" => 0,
        "b3" => 0,
        "c1" => 0,
        "c2" => 0,
        "c3" => 0,
    );

    $_SESSION['turn'] = array(
        "TurnNumber" => 0,
        "PlayerActive" => $_SESSION['player1']['name']
    );
}

# va vérifier si une action existe (a = action)
if(isset($_GET['a']))
{
    $action = $_GET['a'];

    /**
     * Reset la partie et les joueurs
     */
    if ($action == "reset")
    {
        $game->resetGame();
    }

    /**
     * Complete une case par le joueur en cours
     */
    if ($action == "case")
    {

    }
}

