<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -l /exposiciones',
    'user' => $this->user,
)) ?>
<br />
total <?php echo count($this->exposiciones) * 4 ?>
</p>
<table>
<?php $count = 1 ?>
<?php foreach($this->exposiciones as $exposicion) { ?>
    <?php echo $this->partial('exposiciones/views/scripts/exposicion-short.php', array('count' => $count++, 'exposicion' => $exposicion)) ?>
<?php } ?>
</table>
<br />
<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cat */detalles',
    'user' => $this->user,
)) ?>
<?php foreach($this->exposiciones as $exposicion) { ?>
<div class="block">
    <?php echo $this->partial('exposiciones/views/scripts/exposicion-normal.php', array('exposicion' => $exposicion)) ?>
</div>
<?php } ?>
<br />
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'user' => $this->user,
)) ?>
