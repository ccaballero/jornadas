<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/usuarios',
    'cmd' => 'dialog --ok-label "guardar" --nocancel 0 0 0 "titulo:" 1 1 "$title" 1 25 25 0 "texto:" 2 1 "$text" 2 25 25 0',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>

<br />

<?php echo $this->form ?>
