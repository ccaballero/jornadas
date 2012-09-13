<p>Estimado <?php echo $this->user->username ?>:</p>

<p>Usted acaba de registrarse en el sitio
<a href="<?php echo $this->servername ?>"><?php echo $this->servername ?></a>,
por tal motivo se te envia este mail, para confirmar tu correo y proveerte de
los datos de acceso al sitio.</p>

<p>Si desea proseguir con el registro, nosotros te damos la bienvenida:</p>

<p>Los datos en la tablinga de abajo son necesarios para tu acceso al sitio:</p>

<table>
    <tr><td>Nombre Completo: </td><td><?php echo $this->user->getFullname() ?></td></tr>
    <tr><td>Usuario: </td><td><?php echo $this->user->username ?></td></tr>
    <tr><td>Contraseña: </td><td><?php echo $this->password ?></td></tr>
</table>
