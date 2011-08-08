<span class="red">TITULO: </span><a name="<?php echo $this->exposicion->url ?>"><?php echo $this->exposicion->title ?></a>
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
<?php echo $this->exposicion->abstract ?>
<?php } ?>
<br />
<a class="yellow" href="<?php echo $this->url(array('exposicion' => $this->exposicion->url), 'exposiciones_exposicion_ver') ?>">[VER MAS]</a>
<br />
