<p>Estimado <?php echo $this->usuario->username ?>:</p>

<p>Usted acaba de registrarse en el sitio de <?php echo $this->servername ?>, por tal motivo se te envia este mail,
para confirmar tu correo y proveerte de los datos de acceso al sitio.</p>

<p>Si desea proseguir con el registro, nosotros te damos la bienvenida:</p>

<p>Los datos en la tablinga de abajo son necesarios para tu acceso al sitio:</p>

<table>
    <tr><td>Usuario: </td><td><?php echo $this->usuario->username ?></td></tr>
    <tr><td>Contraseña: </td><td><?php echo $this->password ?></td></tr>
</table>
