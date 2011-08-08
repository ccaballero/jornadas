<tr>
    <td>drwxr-xr-x</td>
    <td>2</td>
    <td><?php echo $this->usuario->username ?></td>
    <td><?php echo $this->usuario->username ?></td>
    <td>4096</td>
    <td><?php echo $this->timestamp($this->usuario->tsregister) ?></td>
    <td><a class="blue" href="<?php echo $this->url(array('usuario' => $this->usuario->username), 'usuarios_usuario_ver') ?>"><?php echo $this->usuario->username ?></a></td>
</tr>
