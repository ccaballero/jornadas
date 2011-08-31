<?php $this->placeholder('menu')->captureStart() ?>
<ul style="margin-left: 110px;">
    <li>
        <a class="<?php echo $this->isActive($this->route, 'portada') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'portada') ?>">inicio</a>
    </li>
    <li>
        <a class="<?php echo $this->isActive($this->route, 'exposiciones') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'exposiciones') ?>">exposiciones</a>
    </li>
    <li>
        <a class="<?php echo $this->isActive($this->route, 'usuarios') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'usuarios') ?>">participantes</a>
    </li>
<?php if ($this->auth->hasIdentity()) { ?>
    <li>
        <a class="<?php echo $this->isActive($this->route, 'acceder') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'acceder_salir') ?>">salir</a>
    </li>
<?php } else { ?>
    <li>
        <a class="<?php echo $this->isActive($this->route, 'acceder') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'acceder') ?>">acceder</a>
    </li>
    <?php /*<li>
        <a class="<?php echo $this->isActive($this->route, 'registro') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'registro') ?>">registrarse</a>
    </li>*/ ?>
<?php } ?>
</ul>
<?php $this->placeholder('menu')->captureEnd() ?>
