<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -l /participantes',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />
total <?php echo count($this->usuarios) * 4 ?>
</p>
<table>
<?php $count = 1 ?>
<?php foreach($this->usuarios as $usuario) { ?>
    <?php echo $this->partial('usuarios/views/scripts/usuario-short.php', array('count' => $count++, 'usuario' => $usuario)) ?>
<?php } ?>
    <tr><td>

<?php if ($this->role == 'admin') { ?>
<tr>
    <td>-r-xr--r--</td>
    <td>2</td>
    <td><?php echo $this->user->username ?></td>
    <td><?php echo $this->user->username ?></td>
    <td>3260</td>
    <td><?php echo $this->timestamp(time()) ?></td>
    <td><a class="bold yellow" href="<?php echo $this->url(array(), 'usuarios_agregar') ?>">crear participante.sh</a></td>
</tr>
<tr>
    <td>-r-xr--r--</td>
    <td>2</td>
    <td><?php echo $this->user->username ?></td>
    <td><?php echo $this->user->username ?></td>
    <td>3260</td>
    <td><?php echo $this->timestamp(time()) ?></td>
    <td><a class="bold yellow" href="<?php echo $this->url(array(), 'usuarios_credenciales') ?>">credenciales.pdf</a></td>
</tr>
<?php } ?>

</table>
<br />
<br />
<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
