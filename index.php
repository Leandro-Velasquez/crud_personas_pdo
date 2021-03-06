<?php
/*
    require_once "Clases/persona.php";
    require_once "Clases/listaErrores.php";
    require_once "Clases/paginas.php";

    $persona = new Persona("localhost:3307", "personas_crud_pdo", "root", "");

    if(isset($_POST['id'])){
        $persona->eliminarPersonaRegistro($_POST['id']);
        header("location: index.php");
    }
*/
?>
<?php /*
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro personas</title>
    <link rel="stylesheet" href="styles.css?3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
</head>
<body>
    <div class="div-container-flex">
        <section class="registro">
            <form class="formulario" method="POST">
                <?php
                    $titulo_formulario = isset($_POST["botonEditar"])?"actualizar datos":"registrar persona";
                    $texto_boton = isset($_POST["botonEditar"])?"actualizar":"registrar";
                    $datos =isset($_POST["botonEditar"])?$persona->getDatosPersona($_POST['botonEditar']):null;

                    $nombre = "";
                    $apellido = "";
                    $telefono = "";
                    $email = "";

                    //REGISTRAR Y EDITAR DATOS PERSONA
                    if(isset($_POST["nombre"])){
                        $nombre = $_POST["nombre"];
                        $apellido = $_POST["apellido"];
                        $telefono = $_POST["telefono"];
                        $email = $_POST["email"];

                        $listaErrores = new listaErrores("localhost:3307", "personas_crud_pdo", "root", "");

                        //VERIFICAR QUE LOS DATOS NO ESTEN VACIOS
                        if($listaErrores->verificarNombreReturnBool($nombre) && $listaErrores->verificarNombreReturnBool($apellido) && $listaErrores->verificarTelefonoReturnBool($telefono) && isset($_POST["actualizar"])?true:$listaErrores->verificarEmailReturnBool($email)){
                            //ACTUALIZAR
                            if(isset($_POST["actualizar"])){
                                $persona->editarDatosPersona($_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["email"], $_POST["actualizar"]);
                                $nombre = null;
                                $apellido = null;
                                $telefono = null;
                                $email = null;
                            }
                            else{
                                //REGISTRAR
                                $persona->registrarPersona($_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['email']);
                                $nombre = null;
                                $apellido = null;
                                $telefono = null;
                                $email = null;
                            }
                        }
                        else{
                            if(isset($_POST["actualizar"])){
                                $titulo_formulario = "actualizar datos";
                                $texto_boton = "actualizar";
                            }
                            ?>
                            <ul class="lista-errores">
                                <div class="lista-errores__div">
                                    <?php 
                                        echo $listaErrores->verificarNombreReturnLi($nombre);
                                        echo $listaErrores->verificarApellidoReturnLi($apellido);
                                        echo $listaErrores->verificarTelefonoReturnLi($telefono);
                                        echo isset($_POST["actualizar"])?null:$listaErrores->verificarEmailReturnLi($email);
                                    ?>
                                </div>
                            </ul>
                            <?php
                        }
                    }

                ?>
                <h2 class="formulario__h2"><?php echo $titulo_formulario; ?></h2>
                <div class="formulario__div">
                    <label class="formulario__label" for="nombre">Nombre:</label>
                    <input class="formulario__input" id="nombre" type="text" name="nombre" value=<?php if($datos!="")echo $datos['nombre'];else echo $nombre;?>>
                    <label class="formulario__label" for="apellido">Apellido:</label>
                    <input class="formulario__input" id="apellido" type="text" name="apellido" value=<?php if($datos!="")echo $datos['apellido']; else echo $apellido;?>>
                    <label class="formulario__label" for="telefono">Telefono:</label>
                    <input class="formulario__input" id="telefono" type="text" name="telefono" value=<?php if($datos!="")echo $datos['telefono']; else echo $telefono;?>>
                    <label class="formulario__label" for="email">Email:</label>
                    <input class="formulario__input" id="email" type="text" name="email" value=<?php if($datos!="")echo $datos['email']; else echo $email;?>>

                    <!-- <button class="formulario__button" name=<?php echo $texto_boton; ?> value=<?php echo isset($_POST["botonEditar"])? $_POST["botonEditar"]: "valor_boton_editar_es_registrar"; ?>>
                        <?php echo $texto_boton; ?>
                    </button> -->

                    <button class="formulario__button" name=<?php echo $texto_boton; ?> value=<?php echo isset($_POST["botonEditar"]) || isset($_POST["actualizar"])? (isset($_POST["botonEditar"])?$_POST["botonEditar"]:$_POST["actualizar"]): "valor_boton_editar_es_registrar"; ?>>
                        <?php echo $texto_boton; ?>
                    </button>

                </div>
            </form>
        </section>
        <section class="tabla-datos">
            <table class="table">
                <caption class="table__caption">personas registradas</caption>
                <thead class="table__thead">
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th colspan="2">Email</th>
                </thead>
                <tbody class="table__tbody">
                    <?php
                        $paginas = new Paginas(3);
                        
                        $paginas->mostrarRegistros();
                        //$persona->mostrarDatos();
                    ?>
                </tbody>
            </table>
            <div class="container-botones">
                <?php
                $paginas->botones();
                ?>
            </div>
        </section>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
*/

require "Clases/App.php";
require "config.php";

$app = new App();
?>