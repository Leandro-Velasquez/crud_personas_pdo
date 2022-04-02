<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center w-full sm:w-3/4 ">

    <div class="sm:shadow-2xl">
        <h2 class="bg-neutral-800 text-white font-bold text-2xl py-2 sm:rounded-t-lg">Registros</h2>
        <table class="table-auto bg-white w-full">
            <thead>
                <tr>
                    <td class="font-semibold py-2">Nombre</td>
                    <td class="font-semibold py-2 hidden lg:block">Apellido</td>
                    <td class="font-semibold py-2">Email</td>
                    <td class="font-semibold py-2 hidden lg:block">Telefono</td>
                    <td class="font-semibold py-2">Acciones</td>
                </tr>
            </thead>
            <tbody class="bg-neutral-100">
                <?php
                foreach($personas as $persona)
                {
                ?>
                    <tr>
                        <td class="py-1"><?php echo $persona->nombre; ?></td>
                        <td class="py-1 hidden lg:block"><?php echo $persona->apellido; ?></td>
                        <td class="py-1 break-all"><?php echo $persona->email; ?></td>
                        <td class="py-1 hidden lg:block"><?php echo $persona->telefono; ?></td>
                        <td class="py-1 w-16">
                            <div class="flex justify-between">
                            <a href=""><svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></a>
                            <a href="<?php echo URL_SITE . 'Persona/show/' . $persona->id; ?>"><svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
    </div>
    <div class="bg-inherit text-right text-sky-500 py-2">
        <a href="<?php echo URL_SITE . 'Persona/create'; ?>">Create</a>
    </div>
</div>