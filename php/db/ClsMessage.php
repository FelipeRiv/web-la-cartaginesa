<?php 

    class Message{

        private $messageArray = array('succ' => true, 'msj' => 'succ or err msjs', 'data' => '');

        private $msjArray = array('succ' => true, 'msj' => 'succ or err msjs');

        /**
         * v1 - params status:bool, msj:string, data
         */
        function setMessage($status, $msj, $data = ''){
            
            // * true or false
            $this->messageArray['succ'] = $status;
            // * msj
            $this->messageArray['msj']   = $msj;
            // * data json
            $this->messageArray['data'] = $data;
            
        }

        function setMessageExtraField($fieldName, $value){
            $this->messageArray[$fieldName] = $value;
        }
        /**
         * v1 - return json_encode the 3 params of the json msj
         */
        function getJsonMessage(){
            
            echo json_encode( $this->messageArray );
        }

        function setMsj($status, $msj){
            
            // * true or false
            $this->msjArray['succ'] = $status;
            // * msj
            $this->msjArray['msj']   = $msj;
            
        }
        
        function getJsonMsj(){
            
            echo json_encode( $this->msjArray );
        }
        
        // function setMsj

    }

?>