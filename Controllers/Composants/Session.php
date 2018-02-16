<?php
/**
 * Created by PhpStorm.
 * User: Win7
 * Date: 16/02/2018
 * Time: 23:55
 */

class Session
{
    public function __construct()
    {
        if (session_id() === null){
            session_start();
        }
    }

    /**
     * @param string $key
     * @param $value
     */
    public function addKey(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $message
     * @param string $type
     */
    public function setFlash(string $message, $type= 'success')
    {
        $_SESSION['Flash']['message']   = $message;
        $_SESSION['Flash']['type']      = $type;
    }

    /**
     * @return string
     */
    public function flash()
    {
        if (isset($_SESSION['Flash'])){
            $html = '<div class="alert alert-'.$_SESSION['Flash']['type'].'">';
            $html.= $_SESSION['Flash']['message'];
            $html .= '</div>';
            echo $html;
            unset($_SESSION['Flash']);
        }
    }



}