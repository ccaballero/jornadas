<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'user=`whoami`;grep $user /etc/passwd',
    'sudo' => false,
    'user' => $this->user,
)) ?>
<br/>
<br/>
<span>carlos:x:1000:1000:Carlos Caballero,,,:/home/carlos:/bin/bash</span>
<br/>
<br/>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
)) ?>
</p>