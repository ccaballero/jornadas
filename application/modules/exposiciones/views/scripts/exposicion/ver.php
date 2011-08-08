<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cd /exposiciones/' . preg_replace('/ /', '\ ', $this->exposicion->title) . '/',
    'user' => $this->user,
)) ?>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exposicion->title,
    'cmd' => 'cat detalles',
    'user' => $this->user,
)) ?>
<br />
<?php echo $this->partial('exposiciones/views/scripts/exposicion-large.php', array('exposicion' => $this->exposicion, 'expositor' => $this->expositor)) ?>
<br />
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exposicion->title,
    'cmd' => '_',
    'user' => $this->user,
)) ?>
