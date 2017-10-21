<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18/10/2017
 * Time: 21:20
 */

class User
{
    protected $name;

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
}