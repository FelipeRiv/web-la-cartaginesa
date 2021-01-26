<?php 

    include_once __DIR__.'/../db/ClsDb.php';
    class MailerConfig extends DB{

        // -- account and pass



        function setPassword($password){
            $this->password = $password;
        }

        function getPassword(){
            return $this->password;
        }

        function setMailTienda($mailTienda){
            $this->mailTienda = $mailTienda;
        }

        function getMailTienda(){
            return $this->mailTienda;
        }

        function setMailTo($mailTo){
            $this->mailTo = $mailTo;
        }

        function getMailTo(){
            return $this->mailTo;
        }

        function EncrypPassword($password){
            return password_hash($password, PASSWORD_DEFAULT);
        }


        function insertMail(){
            try {
                $query = $this->connect()->prepare("INSERT INTO mailconfig VALUES(null, :mail, :password)");
                
                $query->execute(['mail' => $this->getMailTienda(), 'password' => $this->getEncrypPassword()]);
        
                    echo "exito";
            } catch(PDOException $e){
                
            }
            catch (\Throwable $th) {
                //throw $th;
            }
           
            
        }

    }

?>

