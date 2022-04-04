<div>
    <?php
    for($i = 1; $i <= $this->numeroDePaginas; $i++)
    {
    ?>
        <a href="<?php echo URL_SITE . 'Persona/index/page=' . $i; ?>"><?php echo $i; ?></a>
    <?php
    }
    ?>
</div>