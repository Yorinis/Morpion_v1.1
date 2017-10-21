<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21/10/2017
 * Time: 12:32
 */

class Autoloader
{
    static function register()
    {
        spl_autoload_register([
           __CLASS__, 'autoload'
        ]);
    }
    static function autoload($class)
    {
        require 'Controller/' .$class. '.php';
    }
}