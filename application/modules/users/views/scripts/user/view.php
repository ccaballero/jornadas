<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'cd /usuarios/' . preg_replace('/ /', '\ ', $this->profile->username) . '/',
    'user' => $this->user,
)) ?>

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/usuarios/' . $this->profile->username,
    'cmd' => 'cat detalles',
    'user' => $this->user,
)) ?>

<br />
<?php echo $this->partial('users/views/scripts/user-large.php', array('user' => $this->profile, 'role' => $this->role)) ?>
<br />

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '/usuarios/' . $this->profile->username,
    'cmd' => '_',
    'user' => $this->user,
)) ?>
