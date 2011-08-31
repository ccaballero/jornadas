<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cd /exposiciones/' . preg_replace('/ /', '\ ', $this->exposicion->title) . '/',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exposicion->title,
    'cmd' => 'cat detalles',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />
<div class="block" style="min-height: 10.0em; border-top: 0.2em dashed #ffffff;">
<?php echo $this->partial('exposiciones/views/scripts/exposicion-large.php', array('exposicion' => $this->exposicion, 'expositor' => $this->expositor)) ?>
</div>
<br />
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exposicion->title,
    'cmd' => '_',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
