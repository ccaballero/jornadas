<?php $this->placeholder('menu')->captureStart() ?>
<ul style="margin-left: 110px;">
    <li><a accesskey="1" class="<?php echo $this->isActive($this->route, 'portada') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'portada') ?>">inicio</a></li>
    <li><a accesskey="2" class="<?php echo $this->isActive($this->route, 'exposiciones') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'exposiciones') ?>">exposiciones</a></li>
    <li><a accesskey="3" class="<?php echo $this->isActive($this->route, 'usuarios') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'usuarios') ?>">participantes</a></li>
    <li><a accesskey="4" class="<?php echo $this->isActive($this->route, 'auspiciadores') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'auspiciadores') ?>">auspiciadores</a></li>
    <li><a accesskey="5" class="<?php echo $this->isActive($this->route, 'propaganda') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'propaganda') ?>">propaganda</a></li>
<?php if ($this->auth->hasIdentity()) { ?>
    <li><a accesskey="6" class="<?php echo $this->isActive($this->route, 'acceder') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'acceder_salir') ?>">salir</a></li>
<?php } else { ?>
    <li><a accesskey="6" class="<?php echo $this->isActive($this->route, 'acceder') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'acceder') ?>">acceder</a></li>
<?php } ?>
</ul>
<?php $this->placeholder('menu')->captureEnd() ?>
