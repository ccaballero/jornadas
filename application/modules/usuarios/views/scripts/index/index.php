<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -l /usuarios',
    'sudo' => false,
    'user' => $this->user,
)) ?>
<br />
total <?php echo count($this->usuarios) * 4 ?>
</p>
<table>
<?php $count = 1 ?>
<?php foreach($this->usuarios as $usuario) { ?>
    <?php echo $this->partial('usuarios/views/scripts/usuario-short.php', array('count' => $count++, 'usuario' => $usuario)) ?>
<?php } ?>
</table>
<br />
<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
)) ?>
