<?php 
class TemplateEmail{

    private $templateEmail;

    public function emailTemplateOwnerForm($name , $lastName , $email , $phone , $comments){

        $templateEmail = 
            "
            <h1>Tienes una nueva cotización </h1>

            <h2> Datos de cliente:</h2>
           
            Nombre cliente:  $name   $lastName <br>
            Correo electrónico: $email <br>
            Teléfono: $phone <br>
            Preguntas o Comentarios: $comments 
            
            ";

        return $templateEmail;

    }

    public function emailTemplateCustForm($name , $lastName , $email , $phone , $comments){

        $templateEmail = 
            "
            <h1>Acabas de solicitar una nueva cotización </h1>

            <h2> Estos son tus datos:</h2>
            
            Nombre cliente:  $name   $lastName <br>
            Correo electrónico: $email <br>
            Teléfono: $phone <br>
            Preguntas o Comentarios: $comments 
            <h3> Pronto te estaremos respondiendo</h3>

            ";

        return $templateEmail;

    }

}

?>