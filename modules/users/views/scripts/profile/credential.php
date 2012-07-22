<h2>Credencial</h2>

<div class="aureal" style="margin: 0 auto;">
    Nombre: <?php echo $this->user->getFullName() ?>
    <br />
    Usuario: <?php echo $this->user->username ?>
    <br />
    Clave: <?php echo $this->user->hash ?>
    <br />
    <img src="<?php echo $this->url(array(), 'profile_qr') ?>" alt="qr" code="qr" width="128px" />
    <br />
    <img src="<?php echo $this->url(array(), 'profile_nineblock') ?>" alt="9block" code="9block" width="128px" />
</div>
<br />

