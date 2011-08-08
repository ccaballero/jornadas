<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cd /usuarios/' . preg_replace('/ /', '\ ', $this->usuario->username) . '/',
    'user' => $this->user,
)) ?>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/usuarios/' . $this->usuario->username,
    'cmd' => 'cat detalles',
    'user' => $this->user,
)) ?>
<br />
<span class="red">NOMBRE COMPLETO: </span><?php echo $this->usuario->fullname ?>
<br />
<br />
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/usuarios/' . $this->usuario->username,
    'cmd' => '_',
    'user' => $this->user,
)) ?>
