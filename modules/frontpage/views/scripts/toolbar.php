<?php $this->placeholder('auth')->captureStart() ?>

<?php if ($this->auth->hasIdentity()) { ?>
<?php echo $this->user->username ?>&nbsp;
[<a accesskey="5" href="<?php echo $this->url(array(), 'profile_credential') ?>">credencial</a>]
[<a accesskey="6" href="<?php echo $this->url(array(), 'profile') ?>">perfil</a>]
[<a accesskey="7" href="<?php echo $this->url(array(), 'auth_out') ?>">salir</a>]
<?php } else { ?>
[<a accesskey="5" href="<?php echo $this->url(array(), 'auth_in') ?>">ingresar</a>]
<?php } ?>

<?php $this->placeholder('auth')->captureEnd() ?>
