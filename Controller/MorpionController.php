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
    protected $turn;
    protected $tab_forward;

    private function manageTurn()
    {

    }

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
        $tab .= "<td><a href='index.php?case=a1&player=".$this->getCurrentPlayer()."' title='Choisir la case A1'>A1</a></td>";
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

        $tab .= "<a href='index.php?a=reset' title='Recommencer une nouvelle partie'>Recommencer</a>";

        echo $tab;
    }
    /**
     * Permet de reset la SESSION
     */
    public function resetGame()
    {
        unset($_SESSION);
        session_destroy();
    }

    ######## getters & setters ################################################

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




}