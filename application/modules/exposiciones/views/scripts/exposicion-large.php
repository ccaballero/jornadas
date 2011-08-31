<div style="float: left; width: 148px; margin-left: 16px;">
    <img src="/icon.php?size=256&hash=<?php echo sha1($this->exposicion->title) ?>" width="128px" alt="" title="" />
</div>

<span class="red">TÍTULO: </span><a class="bold" name="<?php echo $this->exposicion->url ?>"><?php echo $this->exposicion->title ?></a>
<br />
<?php if (isset($this->expositor)) { ?>
    <span class="red">EXPOSITOR: </span><a href="<?php echo $this->url(array('usuario' => $this->expositor->username), 'usuarios_usuario_ver') ?>"><?php echo $this->expositor->fullname ?></a>
<?php } else { ?>
    <span class="red">EXPOSITOR: </span><a href="<?php echo $this->url(array('usuario' => $this->exposicion->username), 'usuarios_usuario_ver') ?>"><?php echo $this->exposicion->fullname ?></a>
<?php } ?>
<?php if (!empty($this->exposicion->abstract)) { ?>
<br />
<span class="red">DESCRIPCIÓN: </span>
<br />
<?php echo $this->specialEscape($this->exposicion->abstract) ?>
<?php } ?>
<br />
