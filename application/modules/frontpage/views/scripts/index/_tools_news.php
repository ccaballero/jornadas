<?php if ($this->role == 'admin' || $this->role == 'organizer') { ?>
    <?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
        'pwd' => '~',
        'cmd' => 'ls -l /',
        'sudo' => false,
        'user' => $this->user,
        'role' => $this->role,
    )) ?>
    <br />

    total <?php echo 1 * 4 ?>
    <table>
        <tr><td>drwxr-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a class="blue" href="<?php echo $this->url(array(), 'propaganda') ?>">afiches</a></td></tr>
        <tr><td>drwxr-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a class="blue" href="<?php echo $this->url(array(), 'users') ?>">asistentes</a></td></tr>
        <tr><td>drwxr-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a class="blue" href="<?php echo $this->url(array(), 'exhibitions') ?>">exposiciones</a></td></tr>
        <tr><td>drwxr-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a class="blue" href="<?php echo $this->url(array(), 'users') ?>">expositores</a></td></tr>
        <tr><td>drwxr-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a class="blue" href="<?php echo $this->url(array(), 'frontpage') ?>">noticias</a></td></tr>
        <tr><td>drwxr-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a class="blue" href="<?php echo $this->url(array(), 'users') ?>">organizadores</a></td></tr>
        <tr><td>drwxr-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a class="blue" href="<?php echo $this->url(array(), 'users') ?>">usuarios</a></td></tr>
        <tr><td>-rw-r-xr-x</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-08-01 12:50</td><td><a href="<?php echo $this->url(array(), 'news_add') ?>">crear_noticia.sh</a></td></tr>
    </table>
    <br />
<?php } ?>
