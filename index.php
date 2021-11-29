<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro personas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <section id="registro">
        <form action="">
            <h2>registrar persona</h2>
            <label for="nombre">Nombre:</label>
            <input id="nombre" type="text" name="nombre">
            <label for="apellido">Apellido:</label>
            <input id="apellido" type="text" name="apellido">
            <label for="telefono">Telefono:</label>
            <input id="telefono" type="text" name="telefono">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email">
            <input type="submit" value="Registrar">
        </form>
    </section>
    <section id="tabla-datos">
        <table>
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Email</th>
            </thead>
            <tbody>
                <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td>
                       <a href="#">Editar</a>
                       <a href="#">Eliminar</a>
                    </td> 
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>