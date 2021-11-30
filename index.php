<?php
    require_once "Clases/persona.php";

    $persona = new Persona("localhost:3307", "personas_crud_pdo", "root", "");

    if(isset($_POST['id'])){
        $persona->eliminarPersonaRegistro($_POST['id']);
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro personas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="div-container-flex">
        <section class="registro">
            <form class="formulario" method="POST">
                <?php
                    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['email'])){
                        $persona->registrarPersona($_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['email']);
                    }
                ?>
                <h2 class="formulario__h2">registrar persona</h2>
                <div class="formulario__div">
                    <label class="formulario__label" for="nombre">Nombre:</label>
                    <input class="formulario__input" id="nombre" type="text" name="nombre">
                    <label class="formulario__label" for="apellido">Apellido:</label>
                    <input class="formulario__input" id="apellido" type="text" name="apellido">
                    <label class="formulario__label" for="telefono">Telefono:</label>
                    <input class="formulario__input" id="telefono" type="text" name="telefono">
                    <label class="formulario__label" for="email">Email:</label>
                    <input class="formulario__input" id="email" type="text" name="email">
                    <input class="formulario__button" type="submit" value="registrar">
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
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>