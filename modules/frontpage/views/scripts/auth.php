<?php $this->placeholder('auth')->captureStart() ?>
<?php if ($this->auth->hasIdentity()) { ?>
[<a accesskey="5" href="<?php echo $this->url(array(), 'profile') ?>">perfil</a>]
[<a accesskey="6" href="<?php echo $this->url(array(), 'auth_out') ?>">salir</a>]
<?php } else { ?>
[<a accesskey="5" href="<?php echo $this->url(array(), 'auth_in') ?>">ingresar</a>]
<?php } ?>
<?php $this->placeholder('auth')->captureEnd() ?>
