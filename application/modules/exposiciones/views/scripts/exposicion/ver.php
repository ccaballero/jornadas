<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cd /exposiciones/' . preg_replace('/ /', '\ ', $this->exposicion->title) . '/',
    'sudo' => false,
    'user' => $this->user,
)) ?>
<br />
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exposicion->title,
    'cmd' => 'cat detalles',
    'sudo' => false,
    'user' => $this->user,
)) ?>
</p>
<p>
<span class="red">TITULO: </span><?php echo $this->exposicion->title ?>
<br />
<span class="red">EXPOSITOR: </span><?php echo $this->expositor->fullname ?>
<?php if (!empty($this->exposicion->abstract)) { ?>
<br />
<span class="red">DESCRIPCIÓN: </span>
<br />
<?php echo $this->exposicion->abstract ?>
<?php  } ?>
</p>
<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exposicion->title,
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
)) ?>
</p>
