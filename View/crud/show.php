<div class="absolute top-24 text-center w-full px-2 sm:px-4 sm:py-4 sm:w-3/4 sm:left-1/2 sm:transform sm:-translate-x-1/2 sm:shadow-2xl md:w-3/5 lg:w-3/6">
    <h2 class="font-semibold text-neutral-700 text-5xl border-b-2 mb-8 pb-5"><?php echo ucwords($persona->nombre . " " . $persona->apellido); ?></h2>
    <form class="flex flex-col gap-3" action="<?php echo URL_SITE . 'Persona/update'; ?>" method="POST">
        <div class="flex flex-col gap-2">
            <label class="text-left" for="nombre">Nombre</label>
            <input id="nombre" name="nombre" value="<?php echo $persona->nombre; ?>" class="border-2 outline-0 p-2" type="text" placeholder="Ingrese su nombre" autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-left" for="apellido">Apellido</label>
            <input id="apellido" name="apellido" value="<?php echo $persona->apellido; ?>" class="border-2 outline-0 px-2 py-2" type="text" placeholder="Ingrese su apellido" autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-left" for="telefono">Telefono</label>
            <input id="telefono" name="telefono" value="<?php echo $persona->telefono; ?>" class="border-2 outline-0 px-2 py-2" type="text" placeholder="Ingrese su telefono" autocomplete="off">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-left" for="email">Email</label>
            <input id="email" name="email" value="<?php echo $persona->email; ?>" class="border-2 outline-0 px-2 py-2" type="text" placeholder="Ingrese su email" autocomplete="off">
        </div>

        <div class="flex justify-start items-center">
            <button name="id" value="<?php echo $persona->id; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">Guardar</button>
            <a class="text-blue-500 hover:text-blue-700" href="<?php echo URL_SITE . 'Persona'; ?>">Ver registros</a>
        </div>
    </form>
</div>