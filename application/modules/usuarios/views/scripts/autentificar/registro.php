<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/usuarios',
    'cmd' => 'dialog --ok-label "registrarse" --nocancel --form "registro" 0 0 0 "nombre completo:" 1 1 "$fullname" 1 25 25 0 "nombre de usuario:" 2 1 "$username" 2 25 25 0 "correo electrónico:" 3 1 "$email" 3 25 25 0',
    'sudo' => false,
    'user' => $this->user,
)) ?>
<br />
<span class="yellow bold form">=============================================</span>
<span class="yellow bold form">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGISTRO</span>
<span class="yellow bold form">=============================================</span>
<?php echo $this->form ?>
