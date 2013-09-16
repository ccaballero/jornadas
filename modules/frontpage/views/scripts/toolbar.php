<?php $this->placeholder('auth')->captureStart() ?>

<ul>
<?php if ($this->auth->hasIdentity()) { ?>
    <li><?php echo $this->user->username ?></li>
    <?php /*if ($this->allowed('profile:view')) { ?>
        [<a accesskey="6" href="<?php echo $this->url(array(), 'profile') ?>">perfil</a>]
    <?php }*/ ?>
    <?php /*if ($this->allowed('credential:view')) { ?>
        [<a accesskey="5" href="<?php echo $this->url(array(), 'profile_credential') ?>">perfil</a>]
    <?php }*/ ?>
    <li><a href="<?php echo $this->url(array(), 'auth_out') ?>"
           accesskey="6">Salir</a></li>
<?php } else { ?>
    <li><a href="<?php echo $this->url(array(), 'auth_in') ?>"
           accesskey="5">Ingresar</a></li>
    <?php if ($this->register) { ?>
           <li><a href="<?php echo $this->url(array(), 'auth_register') ?>"
                  accesskey="6">registro</a></li>
    <?php } ?>
<?php } ?>
</ul>

<?php $this->placeholder('auth')->captureEnd() ?>
