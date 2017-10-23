<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Jeu du Morpion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="View/css/style.css" />
    <script type="text/javascript" src="jquery-3.2.1.js"> </script>
    <script type="text/javascript" src="message.js"> </script>
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
$player1 = new MorpionController(); #
$player2 = new MorpionController(); #
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
    $player1->setName($_SESSION['player']['player1']['name']);
    $player2->setName($_SESSION['player']['player2']['name']);
    $secure = true;
}

# On sécurise en vérifiant côté serveur si les 2 noms ont été remplis
if (isset($_SESSION['player']['player1']['name']) || isset($_SESSION['player']['player2']['name']))
{
    if (empty($player1->getName()) || empty($player2->getName()))
    {
        echo 'ERREUR : Vous devez saisir 2 noms <br />';
        echo '<a href="index.php" title="Retour">Retour</a>';
        $game->resetGame();
        die();
    }
}
################### DISPLAY ################################################################

# On vérifie que toute la procédure avant l'affichage a bien été faite
if ($secure)
{
    ?>
   <div class="container">
       <div class="row">
           <div class="col-lg-4">
               <?= $game->viewScore(); ?>

           </div>
           <div class="col-lg-8">
               <?= $game->viewGameBoard(); ?>
           </div>
       </div>
   </div>
    <?php


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

echo "<h3>PRINT_R SESSION</h3>";

print_r($_SESSION['tab_forward']). "<br />";
print_r($_SESSION['turn']['playerActive']). "<br />";
print_r($_SESSION['turn']['playerActiveUnit']). "<br />";

echo "<h3>VAR_DUMP POO</h3>";

var_dump($game->getCurrentPlayer()). "<br />";
var_dump($game->getCurrentPlayerUnit()). "<br />";

echo "</pre>";
?>
</body>
</html>



