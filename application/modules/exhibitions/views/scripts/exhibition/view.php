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

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exhibition->title,
    'cmd' => 'ls -l | egrep -e "\.pdf|\.avi"',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />

total <?php echo $this->exhibition->getTotal() * 4 ?>
<table>
<?php if ($this->exhibition->hasSlideshow()) { ?>
    <tr><td>-r--r--r--</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011-09-17 21:38</td><td><a href="<?php echo $this->url(array('exhibition' => $this->exhibition->url), 'exhibitions_exhibition_slideshow') ?>">presentacion.pdf</a></td></tr>
<?php } ?>
<?php if ($this->exhibition->hasVideo()) { ?>
    <tr><td>-r--r--r--</td><td>2</td><td>root</td><td>organizador</td><td>4096</td><td>2011</td><td><a href="<?php echo $this->url(array('exhibition' => $this->exhibition->url), 'exhibitions_exhibition_video') ?>">video.avi</a></td></tr>
<?php } ?>
</table>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/exposiciones/' . $this->exhibition->title,
    'cmd' => '_',
    'user' => $this->user,
    'role' => $this->role,
)) ?>
