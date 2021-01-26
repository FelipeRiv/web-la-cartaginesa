<?php 

    include_once './../ClsDb.php';

    class Customer extends DB{

        private $id;
        private $name;
        private $lastName;
        private $email;
        private $phone;

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


        
        // * Methods
        public function selectCustomers(){

            $query = $this->connect()->query("SELECT * FROM $this->TBCustomer",PDO::FETCH_ASSOC);

            $rows = $query->rowCount();

            if ($rows <= 0) {
                return false;
            } else {
                return $query;
            }
            
            
        }

        public function deleteCustomer(){

            $query = $this->connect()->prepare("DELETE FROM $this->TBCustomer WHERE id = :id");

            $query->execute(['id' => $this->getId()]);

            if ($query) {
                echo 'exito';
            }
            else {
                echo 'error';
            }

        }

        public function updateCustomer(){

            try {
                $query = $this->connect()->prepare("UPDATE $this->TBCustomer SET name = :name, lastName = :lastName, email = :email, phone = :phone WHERE id = :id");

                $query->execute(['name' => $this->getName(), 'lastName' => $this->getLastName(), 'email' => $this->getEmail(), 'phone' => $this->getPhone(), 'id' => $this->getId()]);
    
                if ($query) {
                    echo 'exito';
                }
                else {
                    echo 'error';
                }

            } catch (PDOExeption $e) {
                //throw $th;
            }

           

        }


 

    }

?>