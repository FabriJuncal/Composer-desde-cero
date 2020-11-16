<?php
// namespace: Los namespace son una forma de encapsular elementos, ya sean 
// "Clases", "Funciones" o "Constantes
namespace PruebaFabricioJuncal\PSR4Autoloader{

    class miClase
    {
        
        public function miFuncionPublica(): string
        {
            return "Hola desde la miFuncion Publica";
        }
        

        function miFuncion(){
            return "Hola desde la Función";
        }

        
        public $miVariable = "Hola desde la variable";

    }

}
