<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/10/2017
 * Time: 23:26
 */

class Player
{
    protected $name;
    protected $unit;
    protected $img;


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
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }


}