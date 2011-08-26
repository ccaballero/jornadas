<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cd /usuarios/' . preg_replace('/ /', '\ ', $this->user->username) . '/',
    'user' => $this->user,
)) ?>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/usuarios/' . $this->user->username,
    'cmd' => 'cat detalles',
    'user' => $this->user,
)) ?>
<br />
<?php echo $this->partial('usuarios/views/scripts/usuario-large.php', array('usuario' => $this->usuario)) ?>
<br />
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/usuarios/' . $this->user->username,
    'cmd' => '_',
    'user' => $this->user,
)) ?>
