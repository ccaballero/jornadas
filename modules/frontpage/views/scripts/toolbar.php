<?php $this->placeholder('auth')->captureStart() ?>

<?php if ($this->auth->hasIdentity()) { ?>
    <?php echo $this->user->username ?>&nbsp;
    <?php /*if ($this->allowed('profile:view')) { ?>
        [<a accesskey="6" href="<?php echo $this->url(array(), 'profile') ?>">perfil</a>]
    <?php }*/ ?>
    <?php if ($this->allowed('credential:view')) { ?>
        [<a accesskey="5" href="<?php echo $this->url(array(), 'profile_credential') ?>">perfil</a>]
    <?php } ?>
    [<a accesskey="6" href="<?php echo $this->url(array(), 'auth_out') ?>">salir</a>]
<?php } else { ?>
    [<a accesskey="5" href="<?php echo $this->url(array(), 'auth_in') ?>">ingresar</a>]
    <?php if ($this->register) { ?>
    [<a accesskey="6" href="<?php echo $this->url(array(), 'auth_register') ?>">registro</a>]
    <?php } ?>
<?php } ?>

<?php $this->placeholder('auth')->captureEnd() ?>
