<div class="absolute top-1/3 text-center w-full">
    <h2 class="bg-neutral-800 text-white font-bold text-2xl py-2">Registros</h2>
    <div class="">
        <table class="table-auto bg-white w-full">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Email</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody class="bg-neutral-100">
                <?php
                foreach($personas as $persona)
                {
                ?>
                    <tr class="py-8">
                        <td><?php echo $persona->nombre; ?></td>
                        <td class="break-all"><?php echo $persona->email; ?></td>
                        <td class="">
                            <div class="flex justify-between">
                            <a href=""><svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></a>
                            <a href=""><svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="bg-white text-right text-sky-500">
            <a href="<?php echo URL_SITE . 'Persona/create'; ?>">Create</a>
        </div>
    </div>
</div>