<?php 

    include_once '../../ClsDb.php';

    class Category extends DB{

        private $id;
        private $name;

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

        // * fin getters y setters
  
        public function insertCategory(){
            $query = $this->connect()->prepare("INSERT INTO categoria VALUES(null, :name, null)");
            
            $query->execute(['name' => $this->getName()]);

            echo "exito";
        }

        public function deleteCategory(){
            $query = $this->connect()->prepare('DELETE FROM categoria WHERE idCategoria = :id');

            $query->execute(['id' => $this->getId()]);

            if (!$query) {
                echo 'Error: La categoría selecionada podría tener productos en ella, borrar todos los productos asociados a esta para poder eliminarl la categoría';
            } else {
                echo 'Categoría elimina con éxito';
            }
            
        }

        public function selectCategories(){
            $query = $this->connect()->query('SELECT * FROM categoria', PDO::FETCH_ASSOC);

            $rows = $query->rowCount();
            
            if ($rows <= 0) {
                return false;
            } else {
                return $query;
            }

        }


    }


?>