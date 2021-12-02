<?php

    class listaErrores {

        //ESTAS FUNCIONES RETORNAN UN VALOR BOOLEANO
        public function verificarNombreReturnBool($nombre){
            if(!empty($nombre) && strlen($nombre) >= 2){
                return true;
            }
            else{
                return false;
            }
        }

        public function verificarTelefonoReturnBool($telefono){
            if(!empty($telefono) && strlen($telefono) == 10){
                return true;
            }
            else{
                return false;
            }
        }

        public function verificarEmailReturnBool($email){
            if(!empty($email) && strpos($email, '@') !== false && strpos($email, '.com') !== false){
                return true;
            }
            else{
                return false;
            }
        }

        //---------------------------------------------------------------

        //ESTAS FUNCIONES RETORNAN UN ITEM DE TIPO LI
        public function verificarNombreReturnLi($nombre) {
            if (empty($nombre)){
                return '<li class="lista-errores__li lista-errores__li--modified"><i class="fas fa-exclamation-triangle"></i>No deje el campo nombre vacio</li>';
            }
            else if(strlen($nombre) < 2){
                return '<li class="lista-errores__li lista-errores__li--modified"><i class="fas fa-exclamation-triangle"></i>Ingrese un nombre con una longitud mayor a 1 letra.</li>';
            }
            else{
                return null;
            }
        }

        public function verificarApellidoReturnLi($apellido) {
            if(empty($apellido)){
                return '<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>No deje el campo apellido vacio</li>';
            }
            else if(strlen($apellido) < 2){
                return '<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>Ingrese un apellido con una longitud mayor a 1 letra.</li>';
            }
            else{
                return null;
            }
        }

        public function verificarTelefonoReturnLi($telefono) {
            if(empty($telefono)){
                return '<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>No deje el campo telefono vacio</li>';
            }
            else if(strlen($telefono) < 10){
                return '<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>Ingrese un numero de telefono con una longitud igual a 10 digitos.</li>';
            }
        }

        public function verificarEmailReturnLi($email) {
            if(empty($email)){
                return '<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>No deje el campo email vacio.</li>';
            }
            else if(strpos($email, '@') === false) {
                return '<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>Ingrese una direccion de email valida, le falta el @</li>';
            }
            else if(strpos($email, '.com') === false){
                return '<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>Ingrese una direccion de email valida</li>';
            }
            else{
                return null;
            }
        }

    }

?>