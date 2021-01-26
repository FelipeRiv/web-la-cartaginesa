<?php
header('Access-Control-Allow-Origin: *');
include_once __DIR__.'/ClsUserAdmin.php';
include_once __DIR__.'/ClsUserSession.php';

$userSession = new UserSession();
$user = new User();
$hidden ='';
$errorLG = '';

if(isset($_SESSION['rol'])){
    $user->setUser($userSession->getCurrentRol());
    header ($userSession->getAdmin_Menu());
    
}else if(isset($_POST['txtAdminEmail']) && isset($_POST['txtAdminPass'])){
    
    $userForm = $_POST['txtAdminEmail'];
    $passForm = $_POST['txtAdminPass'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        // "Existe el usuario";
        // TODO method to get the rol of this current user if exists
        $userSession->setCurrentRol(1);
        $user->setUser($userForm);

        header ($userSession->getAdmin_Menu());
        
    }else{
        //echo "No existe el usuario";
        $hidden = '';
        $errorLG = "Datos incorrectos";
    }
}else{
    
    // ? first page visit with no active rol do no redirct because of redirect loop
    $hidden = 'hidden';
    $errorLG = '';

}

