<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19/10/2017
 * Time: 01:16
 */

class MorpionController
{
    protected $player1;
    protected $player2;
    protected $currentPlayer;
    protected $currentPlayerUnit;
    protected $turn;
    protected $tab_forward;
    protected $winCondition;
    protected $checkTurn;

    public function hydrateTurn()
    {
        $this->currentPlayer = $_SESSION['turn']['playerActive'];
        $this->currentPlayerUnit = $_SESSION['turn']['playerActiveUnit'];
        $this->turn = $_SESSION['turn']['turnCount'];
        $this->checkTurn = $_SESSION['turn']['checkTurn'];
        $this->tab_forward = $_SESSION['tab_forward'];
    }

    public function hydratePlayer1()
    {

    }

    public function hydratePlayer2()
    {

    }



//    private function manageTurn()
//    {
//        foreach ($this->tab_forward as $case => $value)
//        {
//            if($this->turn == 1)
//            {
//                $this->currentPlayerUnit = $_SESSION['player']['player1']['unit'];
//            }
//            else
//            {
//                if($this->currentPlayerUnit == 1)
//                {
//                    $this->currentPlayerUnit = 2;
//                    //$this->turn++;
//                }
//                else
//                {
//                    $this->currentPlayerUnit = 1;
//                    $this->turn++;
//                }
//            }
//
//        }
//    }

    ######## VIEW ################################################



    /**
     * Affichage du tableau de jeu
     */
    public function viewGameBoard()
    {
        $tab  = "<table border='1'>";
        $tab .= "<tr>";
        $count = 0;
        foreach ($_SESSION['tab_forward'] as $case => $value)
        {
            $goback = null;
            $count++;
            if ($count == 3 || $count == 6 || $count == 9)
            {
                $goback =  "</tr></tr>";
            }
            if($value > 0)
            {
                if($value == 1)
                {
                    $img = "<img src='View/img/".$_SESSION['player']['player1']['img']."' alt='Croix'>";
                }
                else
                {
                    $img = "<img src='View/img/".$_SESSION['player']['player2']['img']."' alt='Cerlce'>";
                }
                $tab .= "<td><a href='index.php?case=".$case."&player=".$_SESSION['turn']['playerActive']."'>".$img."</a></td>";
            }
            else
            {
                $tab .= "<td><a href='index.php?case=".$case."&player=".$_SESSION['turn']['playerActive']."'>".$case."</a></td>";
            }

            $tab .= $goback;

        }

        $tab .= "</table>";

        $tab .= "<a href='index.php?a=reset' title='Recommencer une nouvelle partie'>Recommencer</a>";

        echo $tab;
    }

    public function manageTurn()
    {
        if(isset($_GET['case']))
        {
            # Permet d'incrémenté les tours lorsque qu'une case est cochée

            if($_SESSION['turn']['playerActive'] == $_SESSION['player']['player1']['name'])
            {
                echo "JE SUIS DANS LE IF :: PLAYER 2";


                if($_SESSION['tab_forward'][$_GET['case']] > 0)
                {
                    $this->checkTurn = false;
                    echo '<script type="text/javascript">window.alert("Cette case a déjà été jouée !");</script>';
                }
                else
                {
                    $_SESSION['turn']['playerActive'] = $_SESSION['player']['player2']['name'];
                    $_SESSION['turn']['playerActiveUnit'] = $_SESSION['player']['player2']['unit'];
                    $_SESSION['tab_forward'][$_GET['case']] = $_SESSION['player']['player2']['unit'];
                    $_SESSION['turn']['turnCount']++;
                }
            }
            else
            {
                echo "JE SUIS DANS LE ELSE :: PLAYER 1";

                if($_SESSION['tab_forward'][$_GET['case']] > 0)
                {
                    $this->checkTurn = false;
                    echo '<script type="text/javascript">window.alert("Cette case a déjà été jouée !");</script>';
                }
                else
                {
                    $_SESSION['turn']['playerActive'] = $_SESSION['player']['player1']['name'];
                    $_SESSION['turn']['playerActiveUnit'] = $_SESSION['player']['player1']['unit'];
                    $_SESSION['tab_forward'][$_GET['case']] = $_SESSION['player']['player1']['unit'];
                    $_SESSION['turn']['turnCount']++;
                }
            }
        }
        $view  = "<table border='1'>";
        $view .= "<tr><td>";
        $view .= "Joueur 1 : ". $_SESSION['player']['player1']['name']. "<br />";
        $view .= "Joueur 2 : ". $_SESSION['player']['player2']['name']. "<br /><hr />";
        $view .= "Tour de  : ". $_SESSION['turn']['playerActive']. "<br />";
        $view .= "Tour : ". $_SESSION['turn']['turnCount']. "<br />";
        $view .= "</td></tr></table>";

        echo $view;
    }
    /**
     * Affichage du formulaire nouveaux joueurs
     */
    public function viewFormNewPlayer()
    {
        $form = "<form action='index.php' method='post'>";
        $form .= "<input type='text' name='player1_name' placeholder='Joueur 1' required />";
        $form .= "<input type='text' name='player2_name' placeholder='Joueur 2' required />";
        $form .= "<input type='submit' value='Jouer !' />";

        echo $form;
    }

    public function calculResult()
    {
        $this->winCondition = array(
            "comb1" =>
                [
                    "a1" => $_SESSION['tab_forward']['a1'],
                    "a2" => $_SESSION['tab_forward']['a2'],
                    "a3" => $_SESSION['tab_forward']['a3']
                ],
            "comb2" =>
                [
                    "b1" => $_SESSION['tab_forward']['b1'],
                    "b2" => $_SESSION['tab_forward']['b2'],
                    "b3" => $_SESSION['tab_forward']['b3']
                ],
            "comb3" =>
                [
                    "c1" => $_SESSION['tab_forward']['c1'],
                    "c2" => $_SESSION['tab_forward']['c2'],
                    "c3" => $_SESSION['tab_forward']['c3']
                ],
            "comb4" =>
                [
                    "a1" => $_SESSION['tab_forward']['a1'],
                    "b1" => $_SESSION['tab_forward']['b1'],
                    "c1" => $_SESSION['tab_forward']['c1']
                ],
            "comb5" =>
                [
                    "a2" => $_SESSION['tab_forward']['a2'],
                    "b2" => $_SESSION['tab_forward']['b2'],
                    "c2" => $_SESSION['tab_forward']['c2']
                ],
            "comb6" =>
                [
                    "a3" => $_SESSION['tab_forward']['a3'],
                    "b3" => $_SESSION['tab_forward']['b3'],
                    "c3" => $_SESSION['tab_forward']['c3']
                ],
            "comb7" =>
                [
                    "a1" => $_SESSION['tab_forward']['a1'],
                    "b2" => $_SESSION['tab_forward']['b2'],
                    "c3" => $_SESSION['tab_forward']['c3']
                ],
            "comb8" =>
                [
                    "a3" => $_SESSION['tab_forward']['a3'],
                    "b2" => $_SESSION['tab_forward']['b2'],
                    "c1" => $_SESSION['tab_forward']['c1']
                ],
        );

        foreach ($this->winCondition as $comb => $combNum)
        {
            foreach ($combNum as $case => $unit)
            {
                if($comb == 1)
                {
                    echo "MATCH !!!!!";
                }
            }
        }

        return $this->winCondition;
    }
    /**
     * Permet de reset la SESSION
     */
    public function resetGame()
    {
        unset($_SESSION);
        session_destroy();
    }

    ######## GETTERS & SETTERS ################################################

    /**
     * @return mixed
     */
    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * @param mixed $currentPlayer
     */
    public function setCurrentPlayer($currentPlayer)
    {
        $this->currentPlayer = $currentPlayer;
    }

    /**
     * @return mixed
     */
    public function getTabForward()
    {
        return $this->tab_forward;
    }

    /**
     * @param mixed $tab_forward
     */
    public function setTabForward($tab_forward)
    {
        $this->tab_forward = $tab_forward;
    }

    /**
     * @return mixed
     */
    public function getTurn()
    {
        return $this->turn;
    }

    /**
     * @return mixed
     */
    public function getCurrentPlayerUnit()
    {
        return $this->currentPlayerUnit;
    }

    /**
     * @return mixed
     */
    public function getPlayercase()
    {
        return $this->playercase;
    }



}