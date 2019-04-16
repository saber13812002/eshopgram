<?php
/**
 * 
 */
class Saber
{
    
    public static function handleSaber()
    {
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            header('location: ../saber');
            exit;
        }
    }

    
}