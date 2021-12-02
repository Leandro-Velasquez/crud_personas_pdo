<?php
    require_once "Clases/persona.php";

    $persona = new Persona("localhost:3307", "personas_crud_pdo", "root", "");

    if(isset($_POST['id'])){
        $persona->eliminarPersonaRegistro($_POST['id']);
        header("location: index.php");
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro personas</title>
    <link rel="stylesheet" href="styles.css?2">
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

                        //VERIFICAR QUE LOS DATOS NO ESTEN VACIOS
                        if(!empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($telefono) && !empty($email)){
                            //ACTUALIZAR
                            if(isset($_POST["actualizar"])){
                                $persona->editarDatosPersona($_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["email"], $_POST["actualizar"]);
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
                            ?>
                            <ul class="lista-errores">
                                <div class="lista-errores__div">
                                    <?php echo empty($nombre)?'<li class="lista-errores__li lista-errores__li--modified"><i class="fas fa-exclamation-triangle"></i>Ingrese un nombre</li>':null;?>
                                    <?php echo empty($apellido)?'<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>Ingrese un apellido</li>':null;?>
                                    <?php echo empty($telefono)?'<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>Ingrese un telefono</li>':null;?>
                                    <?php echo empty($email)?'<li class="lista-errores__li"><i class="fas fa-exclamation-triangle"></i>Ingrese un email</li>':null;?>
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

                    <button class="formulario__button" name=<?php echo $texto_boton; ?> value=<?php echo isset($_POST["botonEditar"])? $_POST["botonEditar"]: "valor_boton_editar_es_registrar"; ?>>
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
                        $persona->mostrarDatos();
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    <script src="scripts.js"></script>
</body>
</html>