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
    $_SESSION['player'] = array(
        "player1" => [
            "name" => $_POST['player1_name'],
            "unit" => 1
        ],
        "player2" => [
            "name" => $_POST['player2_name'],
            "unit" => 2
        ]
    );

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
        "playerActive" => $_SESSION['player']['player1']['name'],
        "playerActiveUnit" => $_SESSION['player']['player1']['unit'],
        "turnCount" => 1,
    );
}

# va vérifier si une action existe (a = action)
if(isset($_GET['a']))
{
    $getaction = $_GET['a'];

    /**
     * Reset la partie et les joueurs
     */
    if ($getaction == "reset")
    {
        $game->resetGame();
    }
}

if(isset($_GET['case']))
{
    $getcase = $_GET['case'];
    $getplayer = $_GET['player'];


    if($_SESSION['tab_forward'][$getcase] > 0)
    {
        echo '<script type="text/javascript">window.alert("Cette case a déjà été jouée !");</script>';
    }
    else
    {
        $_SESSION['tab_forward'][$getcase] = $game->getCurrentPlayerUnit();
    }


}

