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