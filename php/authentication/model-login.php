
    <?php 
        header('Access-Control-Allow-Origin: *');
        
        include_once __DIR__.'/ClsUserSession.php';
        
        // construct do session_start;
        $userSession = new UserSession(); 

 
        $userRol = $userSession->getCurrentRol();
        // if there's a session rol and it's different than 1 = admin then go to index
        if( !isset($userRol) ){
            header($userSession->getAdmin_Login());
        }else{
            if($userRol != 1){
                header($userSession->getAdmin_Login());
            }else{
                // ! sirve pero siempre redirecciona a menu aunq vaya al admin productos
                // include_once __DIR__.'/../../views/admin-menu.php';
            }
        }
    ?>