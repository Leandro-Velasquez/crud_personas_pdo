<div class="absolute top-20 text-center w-full px-2">
    <h2 class="font-semibold text-neutral-700 text-5xl border-b-2 mb-8 pb-5">Crear</h2>
    <form class="flex flex-col gap-3" action="<?php echo URL_SITE . 'Persona/store'; ?>" method="POST">
        <div class="flex flex-col gap-2">
            <label class="text-left" for="nombre">Nombre</label>
            <input id="nombre" name="nombre" class="border-2 outline-0 p-2" type="text" placeholder="Ingrese su nombre">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-left" for="apellido">Apellido</label>
            <input id="apellido" name="apellido" class="border-2 outline-0 px-2 py-2" type="text" placeholder="Ingrese su apellido">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-left" for="telefono">Telefono</label>
            <input id="telefono" name="telefono" class="border-2 outline-0 px-2 py-2" type="text" placeholder="Ingrese su telefono">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-left" for="email">Email</label>
            <input id="email" name="email" class="border-2 outline-0 px-2 py-2" type="text" placeholder="Ingrese su email">
        </div>

        <div class="flex justify-start items-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">Crear</button>
            <a class="text-blue-500 hover:text-blue-700" href="<?php echo URL_SITE . 'Persona'; ?>">Ver registros</a>
        </div>
    </form>
</div>