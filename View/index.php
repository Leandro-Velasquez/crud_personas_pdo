<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?php echo URL_SITE . "public/css/app.css"; ?>>
</head>
<body>
    <header class="bg-neutral-800 text-center py-4">
        <h1 class="text-white text-3xl font-bold">CRUD PHP MVC TAILWIND</h1>
    </header>
    <?php
        $this->content($routeView, $params_array);
    ?>
</body>
</html>