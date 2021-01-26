<?php 

    include_once './../ClsDb.php';
    include_once __DIR__.'/../ClsMessage.php';

    class Contact extends DB{

        private $id;
        private $name;
        private $lastName;
        private $email;
        private $phone;
        private $comments;

        private $TBCustomer = 'customer';

        public function setId($id){
            $this->id = $id;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPhone($phone){
            $this->phone = $phone;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function setComments($comments){
            $this->comments = $comments;
        }

        public function getComments(){
            return $this->comments;
        }

        // * Methods
        public function insertContact(){
            try {

                $query = $this->connect()->prepare("INSERT INTO $this->TBCustomer VALUES(null, :name, :lastName, :email, :phone)");

                $query->execute(['name' => $this->getName(), 'lastName' => $this->getLastName(), 'email' => $this->getEmail(), 'phone' => $this->getPhone()]);
                
                return true;

            } catch (PDOException $e) {

                $duplicatedUser = $e->getCode();
                
                if ($duplicatedUser == 23000) {
                    return true;
                }

                return false;
                
            } catch (Exception $e){
                return false;

            }
           
        }

    }

?>