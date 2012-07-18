<?php if ($this->role == 'admin' || $this->role == 'organizer') { ?>
    <?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
        'pwd' => '~',
        'cmd' => 'ls -l /usuarios',
        'sudo' => false,
        'user' => $this->user,
        'role' => $this->role,
    )) ?>
    <br />

    total <?php echo 1 * 4 ?>
    <table>
        <tr><td>-rw-r-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a href="<?php echo $this->url(array(), 'users_export') ?>">exportar_usuarios.sh</a></td></tr>
    </table>
    <br />
<?php } ?>
