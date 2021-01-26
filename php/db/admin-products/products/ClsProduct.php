<?php 
    include './../../ClsDb.php';

    class Product extends DB{

        private $name;
        private $id;
        private $category;
        private $description;
        private $img;
        private $fileName;
        private $imgPath;
        private $imgLocation;
        private $rowCount;

        // * pagination properties
        private $currentPage = 1;// pagination selected from front end
        private $totalPages;// pagination calculated: pages from 1 to n
        private $totalRecords;// pagination records from DB items
        private $resultsByPage = 9;//24 pagination const 
        private $index = 0;// pagination calculated
        private $lastIndex;// pagination

        

        public function setName($name){
            $this->name = $name;
            
        }

        public function getName(){
            return $this->name;
        }  

        public function setId($id){
            $this->id = $id;
            
        }

        public function getId(){
            return $this->id;
        }  

        public function setCategory($category){
            $this->category = $category;
            
        }

        public function getCategory(){
            return $this->category;
        }  

        public function setDescription($description){
            $this->description = $description;
            
        }

        public function getDescription(){
            return $this->description;
        }  

        public function setRowCount($rowCount){
            $this->rowCount = $rowCount;
            
        }

        public function getRowCount(){
            return $this->rowCount;
        }  

        // Pagination methods get set
        public function paginationConstruct($currentPage){
            if ($currentPage <= 0) {
                # code...
                $this->currentPage = 1;// pagination
            }else{
                $this->currentPage = $currentPage;// pagination

            }
            // echo $this->currentPage; 
        }
        
        public function setIndex($index){
            $this->index = $index;
            
        }

        public function getIndex(){
            return $this->index;
        }  
        
        public function setCurrentPage($currentPage){
            $this->currentPage = $currentPage;
            
        }

        public function getCurrentPage(){
            return $this->currentPage;
        }  
        
        public function setTotalPages($totalPages){
            $this->totalPages = $totalPages;
            
        }

        public function getTotalPages(){
            return $this->totalPages;
        }  
        

        public function calcPages(){

            if ($this->getCategory() === 'all') {
               // all products
               $query = $this->connect()->query('SELECT COUNT(*) AS Total FROM producto p JOIN categoria c ON p.Categoria_idCategoria = c.idCategoria');

            } else {
                 // filter by category
                 $query = $this->connect()->prepare('SELECT COUNT(*) AS Total FROM producto p JOIN categoria c ON p.Categoria_idCategoria = c.idCategoria where p.Categoria_idCategoria = :category ');

                 $query->execute(['category' => $this->getCategory()]);
                
            }
            
             // get the value of the colum['Total']
             $countValue = $query->fetch(PDO::FETCH_ASSOC)['Total'];

             $this->totalRecords = $countValue;

             $this->totalPages = ceil($this->totalRecords / $this->resultsByPage);

             $this->lastIndex = $this->currentPage * $this->resultsByPage;
             $this->index = ($this->lastIndex - ($this->resultsByPage - 1)) -1;
            // echo' $this->index';
            // echo $this->index;
            //  echo $this->index; // 0
            //  echo "\n"; //1
            //  echo $this->totalPages; //7 pages
            //  echo "\n"; //1
            //  echo $this->totalRecords; // 1
            //  echo "\n"; //1
            //  echo $this->index;

        }

        public function selectProducts (){
            $query = $this->connect()->prepare('SELECT c.idCategoria, c.nombre, p.idProducto, p.nombre, p.descripcion, p.imgPath, p.Categoria_idCategoria FROM producto p JOIN categoria c ON p.Categoria_idCategoria = c.idCategoria where p.Categoria_idCategoria = :category ');

            // !detele
            // $this->setCategory(2);// if fetch in return to test

            $query->execute(['category' => $this->getCategory()]);

            $this->setRowCount($query->rowCount()); 

            if ($this->getRowCount() <= 0) {
                return false;
            } else {
                // return  $query->fetch(PDO::FETCH_ASSOC); // print with json enconde and 
                return  $query;
            }

        }

        public function selectProductsLimit (){

            if ($this->getCategory() === 'all') {
                # code...
                $query = $this->connect()->prepare('SELECT c.idCategoria, c.nombre, p.idProducto, p.nombre, p.descripcion, p.imgPath, p.Categoria_idCategoria FROM producto p JOIN categoria c ON p.Categoria_idCategoria = c.idCategoria ORDER BY c.idCategoria LIMIT :pos, :n ');

                $query->execute(['pos' => $this->index, 'n' => $this->resultsByPage]);
            }else{

                $query = $this->connect()->prepare('SELECT c.idCategoria, c.nombre, p.idProducto, p.nombre, p.descripcion, p.imgPath, p.Categoria_idCategoria FROM producto p JOIN categoria c ON p.Categoria_idCategoria = c.idCategoria where p.Categoria_idCategoria = :category ORDER BY p.nombre LIMIT :pos, :n');
    
                $query->execute(['category' => $this->getCategory(), 'pos' => $this->index, 'n' => $this->resultsByPage]);
            }

            // $query->fetch(PDO::FETCH_ASSOC);

            $this->setRowCount($query->rowCount()); 
            if ($this->getRowCount() <= 0) {
            
                return false;
            } else {
                // return  $query->fetch(PDO::FETCH_BOTH); // print with json enconde and 
                // return  $query->fetch(); // print with json enconde and 
                return $query;
            }

        }

        public function selectAllProducts (){
            $query = $this->connect()->query('SELECT * FROM producto', PDO::FETCH_ASSOC);

            $this->setRowCount($query->rowCount());

            if ($this->getRowCount() <= 0) {
                return false;
            } else {
                return $query;
            }

        }


        public function deleteProduct (){
            $query = $this->connect()->prepare('DELETE FROM producto WHERE idProducto = :id ');

            $query->execute(['id' => $this->getId()]);

            $rows = $query->rowCount(); 

            if ($rows <= 0) {
                return false;
            } else {
                return $query;
            }

            // return $query;

        }

        /**
         * Select the imgPath from a product where id is the one in the params, if the path exists return an array with the value, else false
         */
        public function selectFilePath($id){
            $query = $this->connect()->prepare('SELECT imgPath FROM producto WHERE idProducto = :id ');

            // $query->execute(['id' => $this->getId()]);
            $query->execute(['id' => $id]);

            $rows = $query->rowCount(); 

            if ($rows <= 0) {
                return false;
            } else {
                // return the object but with fetch an array with the values
                return $query->fetch();
            }
        }

        /**
         * Delete a file from the path given in the params :string, if the path exists returns true else false
         */
        public function deleteImg($imgPath){

            if (file_exists($imgPath)) 
            {
              unlink($imgPath);
            //    echo "File Successfully Delete."; 
            return true;

           }
           else
           {
            return false;
           }

        }

        public function deleteProductImg($filePath){

            if (file_exists($filePath)) 
            {
              unlink($filePath);
               echo "File Successfully Delete."; 
           }
           else
           {
            echo "File does not exists"; 
           }
        }


        // * IMG

        public function setImgName($img){
            
            $this->img = $img;
            
        }
        
        public function getImgName(){
            return $this->img;
        }  

        public function setImgPath($imgPath){
            
            // $this->setFileName();
            $this->imgPath = $imgPath;
            
        }
        
        public function getImgPath(){
            // echo 'imgPath'. $this->imgPath;
            return $this->imgPath;
        }  

          // * aux img location in folder with its name, not the path
        public function setImgLocation($imgLocation){
            
            // $this->setFileName();
            $this->imgLocation = $imgLocation;
            
        }
          // * aux img location in folder with its name, not the path
        public function getImgLocation(){
            // echo 'imgLocation'. $this->imgLocation;
            return $this->imgLocation;
        }  
        
        public function testFileName(){
            $this->tempFileName =  $_FILES["file"]["name"]; // obtengo un arreglo con el nombre del archivo y extension
            // echo $this->tempFileName;
            return $this->tempFileName;
            // $this->fileName = $this->id. '-' .$tempFileName; // renombro el archivo conservando extension
        }  

        public function setFileName(){
            
            $this->tempFileName =  $_FILES["file"]["name"]; // obtengo un arreglo con el nombre del archivo y extension
            $this->fileName = $this->id. '-' .$this->tempFileName; // renombro el archivo conservando extension
            // echo 'fileName ->'.$this->fileName;
        }  

        public function getFileName(){
            
            return $this->fileName;
        }  

        public function insertProduct(){
            $query = $this->connect()->prepare("INSERT INTO producto VALUES(:id, :name, :description, :imgPath, null, null, :Fk_Cat_id_Cat)");
            
            $query->execute(['id' => $this->getId(), 'name' => $this->getName(), 'description' => $this->getDescription(), 'imgPath' => $this->getImgLocation(), 'Fk_Cat_id_Cat' => $this->getCategory()]);
        }

        public function imgValidation(){
            $tempFileName =  $_FILES["file"]["name"]; // obtengo un arreglo con el nombre del archivo y extension
            $filename = $this->id. '-' .$tempFileName; // r

            $location =  "../../../../image/upload/".$filename;
            $locationForDB =  "image/upload/".$filename;
            $this->setImgPath($location); // its to save the img in this path folder
            $this->setImgLocation($locationForDB); // goes to db


            $uploadOk = 1;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        
            /* Valid Extensions */
            $valid_extensions = array("jpg","jpeg","png");
            /* Check file extension */
            if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
            $uploadOk = 0;
            }
        
            if($uploadOk == 0){
        
            echo 0;
            }else{
            /* Upload file */
                if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        
                    // $sql = "INSERT INTO producto VALUES('$id','$nombre', '$descripcion', '$location', NULL, NULL, '$categoria')";
                 
                    // $result = mysqli_query($conexion, $sql);
                    $result = $this->insertProduct();
                    
                    // echo 'result **********';
                    // echo $result .' hey';
                    // echo gettype($result);
                    // ! como evaluar que si el query fue exitoso en PDO
                    if ($result) {
                    
                        echo "Producto aregado con éxito";
                    }else{
                        // echo "Error BD insert Producto";
                        echo "Error BD insert Producto: " .$this->id . " - " .$this->category;
                    }
                    
                }else{
                    echo 0;
                }

            }

        }

        // * fin img

    }//* class

?>