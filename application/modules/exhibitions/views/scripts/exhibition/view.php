<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cd /exposiciones/' . preg_replace('/ /', '\ ', $this->exhibition->title) . '/',
    'user' => $this->user,
    'role' => $this->role,
)) ?>

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exhibition->title,
    'cmd' => 'cat detalles',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />

<?php echo $this->partial('exhibitions/views/scripts/exhibition-large.php', array('exhibition' => $this->exhibition, 'exhibitor' => $this->exhibitor)) ?>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exhibition->title,
    'cmd' => '_',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
