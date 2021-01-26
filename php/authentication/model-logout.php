<?php
    header('Access-Control-Allow-Origin: *');

    include_once __DIR__.'/ClsUserSession.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    // Define(ADMIN_PANEL, 'location: menu-admin.php');
    // ! to test and go to direct url
    // Define(ADMIN_LOGIN, 'location: ../../admin-login.php');

    // TODO To use in with an include statement
    Define(ADMIN_LOGIN, 'location: admin-login.php');

    // header("location: ../index.php");
    header(ADMIN_LOGIN);

?>