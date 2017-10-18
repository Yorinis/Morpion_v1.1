<link rel="stylesheet" href="View/css/style.css" />
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/10/2017
 * Time: 21:11
 */
session_start();
$secure = false;
################### CONFIG #################################################################

require_once 'Controller/User.php';

# Initialise les deux joueurs
########################
$player1 = new User(); #
$player2 = new User(); #
########################

require 'Route/route.php';
require 'View/Form.php';

# Si la session est vide, on affiche le formulaire des nouveaux joueurs
if (empty($_SESSION))
{
    echo viewFormNewPlayer();
}
# Si la session existe on fait un setter des noms des 2 joueurs
else
{
    $player1->setName($_SESSION['player1']['name']);
    $player2->setName($_SESSION['player2']['name']);
}

# On sécurise en vérifiant côté serveur si les 2 noms ont été remplis
if (isset($_SESSION['player1']['name']) || isset($_SESSION['player2']['name']))
{
    if (empty($player1->getName()) || empty($player2->getName()))
    {
        echo 'Vous devez saisir 2 noms <br />';
        echo '<a href="index.php" title="Retour">Retour</a>';
        session_destroy();
        die();
    }
}
################### DISPLAY ################################################################

# On vérifie que toute la procédure avant l'affichage a bien été faite
if ($secure)
{
    echo viewGameBoard();
}

################### DEBUGAGE ###############################################################
echo "<pre>";

echo "<h3>DUMP des $ Players</h3>";

var_dump($player1->getName());
echo "<br />";
var_dump($player2->getName());

echo "<h3>PRINT de la SESSION</h3>";

print_r($_SESSION);

echo "</pre>";




