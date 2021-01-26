<?php
header('Access-Control-Allow-Origin: *');

class UserSession{

    private $ADMIN_LOGIN = 'location: admin-login.php';
    private $ADMIN_MENU = 'location: admin-menu.php';

    public function __construct(){
        session_start();
    }

    public function setCurrentRol($rol){
        $_SESSION['rol'] = $rol;
    }

    public function getCurrentRol(){
        return $_SESSION['rol'];
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function getAdmin_Login(){
        return $this->ADMIN_LOGIN;
    }

    public function getAdmin_Menu(){
        return $this->ADMIN_MENU;
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>