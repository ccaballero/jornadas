<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -l /exposiciones',
    'sudo' => false,
    'user' => $this->user,
)) ?>
</p>
total <?php echo count($this->exposiciones) * 4 ?>
<table>
<?php $count = 1 ?>
<?php foreach($this->exposiciones as $exposicion) { ?>
    <?php echo $this->partial('exposiciones/views/scripts/exposicion.php', array('count' => $count++, 'exposicion' => $exposicion)) ?>
<?php } ?>
</table>
<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
)) ?>
</p>
