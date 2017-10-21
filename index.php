<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Jeu du Morpion</title>
    <link rel="stylesheet" href="View/css/style.css" />
</head>
<body>
<?php
session_start();

require 'Controller/Autoloader.php';
Autoloader::register();

################### CONFIG #################################################################

$secure = false; // Check l'état de la session, vérifie si les 2 noms des joueurs ont bien été enregistré en session

# Initialise les deux joueurs
########################
$player1 = new User(); #
$player2 = new User(); #
########################

$game = new MorpionController();

require 'Route/route.php';

# Si la session est vide, on affiche le formulaire des nouveaux joueurs
if (empty($_SESSION))
{
    $game->viewFormNewPlayer();
}
# Si la session existe on initialise tous les attributs avec la session
else
{
    $player1->setName($_SESSION['player1']['name']);
    $player2->setName($_SESSION['player2']['name']);
    $game->setTabForward($_SESSION['tab_forward']);
    $game->setCurrentPlayer($_SESSION['turn']['PlayerActive']);

    $secure = true;
}

# On sécurise en vérifiant côté serveur si les 2 noms ont été remplis
if (isset($_SESSION['player1']['name']) || isset($_SESSION['player2']['name']))
{
    if (empty($player1->getName()) || empty($player2->getName()))
    {
        echo 'ERREUR : Vous devez saisir 2 noms <br />';
        echo '<a href="index.php" title="Retour">Retour</a>';
        session_destroy();
        die();
    }
}
################### DISPLAY ################################################################

# On vérifie que toute la procédure avant l'affichage a bien été faite
if ($secure)
{
    $game->viewGameBoard();
}
if(isset($_GET['action']))
{
    $action = $_GET['action'];

    if($action == "reset")
    {
        $game->resetGame();
    }
}
################### DEBUGAGE ###############################################################
echo "<pre>";

echo "<h3>DUMP des $ Players</h3>";

echo " Nom joueur 1 :";
var_dump($player1->getName());
echo "<br /> Nom joueur 2 :";
var_dump($player2->getName());
echo "<br /> Tableau de jeu :";
var_dump($game->getTabForward());
echo "<br /> Joueur actuel :";
var_dump($game->getCurrentPlayer());

echo "<h3>PRINT de la SESSION</h3>";
if (!empty($_SESSION))
{
  print_r($_SESSION);
}



echo "</pre>";

?>
</body>
</html>



