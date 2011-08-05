<p>Estimado <?= $this->usuario->fullname ?>:</p>

<p>Usted acaba de registrarse en el sitio de las Jornadas de Seguridad Informática, por tal motivo se te envia este mail,
para confirmar tu correo y proveerte de los datos de acceso al sitio.</p>

<p>Si desea proseguir con el registro, nosotros te damos la bienvenida:</p>

<p>Los datos en la tabla son necesarios para tu acceso al sitio:</p>

<table>
    <tr><td>Usuario: </td><td><?= $this->usuario->username ?></td></tr>
    <tr><td>Contraseña: </td><td><?= $this->password ?></td></tr>
</table>
