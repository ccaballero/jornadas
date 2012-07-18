<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/usuarios',
    'cmd' => 'cat ayuda; dialog --ok-label "actualizar" --nocancel 0 0 0 "apellidos:" 1 1 "$surname" 1 25 25 0 "nombres:" 2 1 "$name" 2 25 25 0 "nombre de usuario:" 3 1 "$username" 3 25 25 0 "correo electrónico:" 4 1 "$email" 4 25 25 0',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>

<br />
<p>Ahora que habeis decidido verificar tu información, recuerda que lo que aqui escribas, será en ultima instancia lo que en tu certificado aparezca, si tienes algún inconveniente respecto al título que ostentais, deberás ir al scesi a corregir tal asunto en la brevedad posible.</p>
<br />

<?php echo $this->form ?>
