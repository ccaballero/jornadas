<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cacaview /afiches/principal.jpg',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />
<img src="/media/afiches/afiche_oficial.jpg" width="100%" alt="" title="" />

<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
