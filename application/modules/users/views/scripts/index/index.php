<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -l /expositores',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />

total <?php echo count($this->exhibitors) * 4 ?>
<table>
<?php $count = 1 ?>
<?php foreach($this->exhibitors as $user) { ?>
    <?php echo $this->partial('users/views/scripts/user-short.php', array('count' => $count++, 'user' => $user)) ?>
<?php } ?>
    <tr><td>
    <?php echo $this->partial('users/views/scripts/index/tools.php', array('role' => $this->role, 'user' => $this->user)); ?>
</table>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -l /organizadores',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />
total <?php echo count($this->organizers) * 4 ?>
<table>
<?php $count = 1 ?>
<?php foreach($this->organizers as $user) { ?>
    <?php echo $this->partial('users/views/scripts/user-short.php', array('count' => $count++, 'user' => $user)) ?>
<?php } ?>
    <tr><td>
    <?php echo $this->partial('users/views/scripts/index/tools.php', array('role' => $this->role, 'user' => $this->user)); ?>
</table>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -l /asistentes',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />
total <?php echo count($this->assistants) * 4 ?>
<table>
<?php $count = 1 ?>
<?php foreach($this->assistants as $user) { ?>
    <?php echo $this->partial('users/views/scripts/user-short.php', array('count' => $count++, 'user' => $user)) ?>
<?php } ?>
    <tr><td>
    <?php echo $this->partial('users/views/scripts/index/tools.php', array('role' => $this->role, 'user' => $this->user)); ?>
</table>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
