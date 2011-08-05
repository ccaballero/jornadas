<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '/usuarios',
    'cmd' => 'sudo chroot /usuarios/guest /bin/bash',
    'sudo' => true,
    'user' => $this->user,
)) ?>
<br />
<br />
<span class="red bold form">=========================================</span>
<span class="red bold form">LOGIN</span>
<span class="red bold form">=========================================</span>
<?php echo $this->form ?>
<span class="red bold form">=========================================</span>
<span class="red bold form">=========================================</span>
<br/>
<br/>
</p>
