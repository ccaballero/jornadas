<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -lh /afiches',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
