<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/10/2017
 * Time: 21:42
 */

# On vérifie si le formulaire des nouveaux joueurs a été envoyé :
# Si oui, on passe le post dans la session
if(isset($_POST['player1_name']) && isset($_POST['player2_name']))
{
    $_SESSION['player1']['name'] = $_POST['player1_name'];
    $_SESSION['player2']['name'] = $_POST['player2_name'];

    $secure = true;
}

