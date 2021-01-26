<?php
include __DIR__.'/../db/ClsDb.php';

class User extends DB{
    private $name;
    private $email;
    // private $username;
    private $rol;

    // table names TB
    private $TBUserAdmin = 'useradmin';


    public function userExists($email, $pass){
        // $md5pass = md5($pass);

        $query = $this->connect()->prepare("SELECT * FROM $this->TBUserAdmin WHERE email = :email AND password = :pass");
        $query->execute(['email' => $email, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($email){
        $query = $this->connect()->prepare("SELECT * FROM $this->TBUserAdmin WHERE email = :email");
        $query->execute(['email' => $email]);
        
        foreach ($query as $currentUser) {
            $this->email = $currentUser['email'];
            $this->rol = $currentUser['rol'];

            // * this to test
            // return $this->email . $this->rol;
            // $this->username = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRol(){
        return $this->rol;
    }
}

// -------------1
// * it works
// $user = new User();
// * it works
// echo json_encode( $user->userExists('rhino@druid.com', 'dudu'));

// * it works
// echo json_encode( $user->setUser('rhino@druid.com'));
// -------------1


?>