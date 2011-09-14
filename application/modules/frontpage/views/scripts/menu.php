<?php $this->placeholder('menu')->captureStart() ?>
<ul>
    <li><a accesskey="1" class="<?php echo $this->isActive($this->route, 'frontpage') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'frontpage') ?>">portada</a></li>
    <li><a accesskey="2" class="<?php echo $this->isActive($this->route, 'exhibitions') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'exhibitions') ?>">exposiciones</a></li>
    <li><a accesskey="3" class="<?php echo $this->isActive($this->route, 'users') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'users') ?>">participantes</a></li>
    <li><a accesskey="4" class="<?php echo $this->isActive($this->route, 'gallery') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'gallery') ?>">galeria</a></li>
    <li><a accesskey="5" class="<?php echo $this->isActive($this->route, 'sponsors') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'sponsors') ?>">auspiciadores</a></li>
    <li><a accesskey="6" class="<?php echo $this->isActive($this->route, 'propaganda') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'propaganda') ?>">propaganda</a></li>
<?php if ($this->auth->hasIdentity()) { ?>
    <li><a accesskey="7" class="<?php echo $this->isActive($this->route, 'profile') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'profile') ?>">perfil  </a></li>
    <li><a accesskey="8" class="<?php echo $this->isActive($this->route, 'auth_out') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'auth_out') ?>">salir</a></li>
<?php } else { ?>
    <li><a accesskey="7" class="<?php echo $this->isActive($this->route, 'auth_in') ? 'active' : 'inactive' ?>" href="<?php echo $this->url(array(), 'auth_in') ?>">acceder</a></li>
<?php } ?>
</ul>
<?php $this->placeholder('menu')->captureEnd() ?>
