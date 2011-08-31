<tr>
    <td>drwxr-xr-x</td>
    <td>2</td>
    <td><?php echo $this->usuario->username ?></td>
    <td><?php echo $this->usuario->username ?></td>
    <td>4096</td>
    <td><?php echo $this->timestamp($this->usuario->tsregister) ?></td>
<?php if ($this->usuario->role == 'exponent') { ?>
    <td><a class="magenta" href="<?php echo $this->url(array('usuario' => $this->usuario->username), 'usuarios_usuario_ver') ?>"><?php echo $this->usuario->username ?></a></td>
<?php } else { ?>
    <td><a class="blue" href="<?php echo $this->url(array('usuario' => $this->usuario->username), 'usuarios_usuario_ver') ?>"><?php echo $this->usuario->username ?></a></td>
<?php } ?>
</tr>
