<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19/10/2017
 * Time: 01:16
 */

class MorpionController
{
    protected $name;
    protected $currentPlayer;
    protected $currentPlayerUnit;
    protected $playercase;
    protected $turn;
    protected $tab_forward;

    private function manageTurn()
    {
        foreach ($_SESSION['tab_forward'] as $case => $value)
        {
            if($value > 0)
            {
                $_SESSION['turn']['turnCount']++;

                if($_SESSION['turn']['playerActiveUnit'] == 1)
                {
                    $_SESSION['turn']['playerActiveUnit'] = 2;
                }
                else
                {
                    $_SESSION['turn']['playerActiveUnit'] = 1;
                }
            }
        }
    }

    ######## VIEW ################################################

    /**
     * Affichage du formulaire nouveaux joueurs
     */
    public function viewFormNewPlayer()
    {
        $form  = "<form action='index.php' method='post'>";
        $form .= "<input type='text' name='player1_name' placeholder='Joueur 1' required />";
        $form .= "<input type='text' name='player2_name' placeholder='Joueur 2' required />";
        $form .= "<input type='submit' value='Jouer !' />";

        echo $form;
    }

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
                $tab .= "<td><a href='index.php?case=".$case."&player=".$_SESSION['turn']['playerActive']."'>".$value."</a></td>";
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

    public function viewScore()
    {
        if(isset($_GET['case']))
        {
            # Permet d'incrémenté les tours lorsque qu'une case est co
            if($_SESSION['tab_forward'][$_GET['case']] == 0)
            {
                $_SESSION['turn']['turnCount']++;
            }

            if($_SESSION['turn']['playerActive'] == $_SESSION['player']['player2']['name'])
            {
                echo "JE SUIS DANS LE IF :: PLAYER 1";

                $_SESSION['turn']['playerActive'] = $_SESSION['player']['player1']['name'];
                $_SESSION['turn']['playerActiveUnit'] = $_SESSION['player']['player1']['unit'];
                $_SESSION['tab_forward'][$_GET['case']] = $_SESSION['player']['player1']['unit'];

            }
            else
            {
                echo "JE SUIS DANS LE ELSE :: PLAYER 2";
                $_SESSION['turn']['playerActive'] = $_SESSION['player']['player2']['name'];
                $_SESSION['turn']['playerActiveUnit'] = $_SESSION['player']['player2']['unit'];
                $_SESSION['tab_forward'][$_GET['case']] = $_SESSION['player']['player2']['unit'];
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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