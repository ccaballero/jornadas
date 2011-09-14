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
    <td><a class="bold yellow" href="<?php echo $this->url(array(), 'usuarios_pre_credenciales') ?>">generar hash</a></td>
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
