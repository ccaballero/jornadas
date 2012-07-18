<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -ltr /exposiciones',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />

total <?php echo count($this->exhibitions) * 4 ?>
<table>
<?php $count = 1 ?>
<?php foreach($this->exhibitions as $exhibition) { ?>
    <?php echo $this->partial('exhibitions/views/scripts/exhibition-short.php', array('count' => $count++, 'exhibition' => $exhibition)) ?>
<?php } ?>
</table>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cat */detalles',
    'user' => $this->user,
    'role' => $this->role,
)) ?>

<br />
<?php foreach($this->exhibitions as $exhibition) { ?>
    <?php echo $this->partial('exhibitions/views/scripts/exhibition-normal.php', array('exhibition' => $exhibition)) ?>
<?php } ?>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
